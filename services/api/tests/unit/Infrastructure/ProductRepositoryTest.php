<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Infrastructure\Domain\Product\ApiProductRepository;

class ProductRepositoryTest extends TestCase
{
	private $responseSanitizer;

	public function setUp()
	{
		$this->responseSanitizer = Mockery::mock(\Application\Api\ResponseSanitizer::class);
		$this->responseSanitizer->shouldReceive('sanitizeArray')
			->andReturnArg(0);
	}

	public function testNotFoundExeptionIsThrownForAnInvalidProductID()
	{
		$clientMock = Mockery::mock(\GuzzleHttp\Client::class);
		$clientMock->shouldReceive('get->getBody')
			->andReturn('{"error":"Unknown product ID"}');

		$productRepository = new ApiProductRepository($clientMock, $this->responseSanitizer);

		$this->expectException(\Product\ProductNotFoundException::class);

		$productRepository->getByID('iNvAlIdId');
	}

	public function testUnavailableExceptionIsThrownWhenApiIsDown()
	{
		$clientMock = Mockery::mock(\GuzzleHttp\Client::class);
		$clientMock->shouldReceive('get->getBody')
			->andThrow(new \GuzzleHttp\Exception\ClientException('test', \Mockery::mock(\Psr\Http\Message\RequestInterface::class)));

		$productRepository = new ApiProductRepository($clientMock, $this->responseSanitizer);

		$this->expectException(\Product\ProductInfoUnavailableException::class);

		$productRepository->getByID('test');
	}

	/**
	 * @dataProvider validClientResponses
	 * @param string $id
	 * @param array $response
	 */
	public function testWeCanRetrieveAProductByItsID(string $id, array $response)
	{
		$clientMock = Mockery::mock(\GuzzleHttp\Client::class);
		$clientMock->shouldReceive('get->getBody')
			->andReturn(json_encode([$id => $response]));

		$productRepository = new ApiProductRepository($clientMock, $this->responseSanitizer);

		$product = $productRepository->getByID($id);

		$this->assertInstanceOf(\Product\Product::class, $product);
		$this->assertSame($id, $product->getId());
		$this->assertSame(($response['name'] ?? ''), $product->getName());
		$this->assertSame(($response['description'] ?? ''), $product->getDescription());
		$this->assertSame(($response['type'] ?? ''), $product->getType());
		$this->assertSame(($response['suppliers'] ?? []), $product->getSuppliers());
	}

	public function testWeCanGetAListOfProducts()
	{
		$clientMock = Mockery::mock(\GuzzleHttp\Client::class);
		$clientMock->shouldReceive('get->getBody')
			->times(3)
			->andReturn(
				json_encode(['products' => ['car' => 'Car Insurance', 'home' => 'Home Insurance']]),
				'{"car":{"name":"Car Insurance","description":"\u0000\"Comprehensive car insurance\"\u001e"}}',
				'{"home":{"name":"Home Insurance","description":"Some Details"}}'
			);

		$productRepository = new ApiProductRepository($clientMock, $this->responseSanitizer);

		$products = $productRepository->getAll();

		$this->assertIsArray($products);
		$this->assertCount(2, $products);

		foreach ($products as $product) {
			$this->assertInstanceOf(\Product\Product::class, $product);
		}
	}

	public function testTheRepositoryRetriesApiUntilThereAreNoErrors()
	{
		$tries = 150;
		$responses = [];

		for ($i = 0; $i < $tries; $i++) {
			$responses[] = json_encode(['error' => 'Some Error']);
		}

		$responses[] = '{"car":{"name":"Car Insurance","description":"Comprehensive car insurance"}}';

		$clientMock = Mockery::mock(\GuzzleHttp\Client::class);
		$clientMock->shouldReceive('get->getBody')
			->andReturnValues($responses);

		$productRepository = new ApiProductRepository($clientMock, $this->responseSanitizer);

		$product = $productRepository->getByID('car');

		$this->assertInstanceOf(\Product\Product::class, $product);
	}

	public function validClientResponses(): array
	{
		return [
			['car', ['name' => 'Car Insurance', 'description' => 'Fully Comp', 'type' => 'This is a type', 'suppliers' => []]],
			['house', ['name' => 'Insurance for your House', 'description' => 'In case of a fire or flood', 'type' => 'fire/flood', 'suppliers' => ['provider 1', 'provider 2']]],
			['life', ['name' => 'Life Insurance', 'description' => 'In case you die', 'type' => 'dont-die', 'suppliers' => ['Direct Line']]],
			['contents', ['name' => 'Insurance for your Property', 'description' => 'Try not to drop your phone']],
		];
	}
}
