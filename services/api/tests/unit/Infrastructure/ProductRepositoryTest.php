<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Infrastructure\Domain\Product\ApiProductRepository;

class ProductRepositoryTest extends TestCase
{
	/**
	 * @var ApiProductRepository
	 */
	private $productRepository;

	public function setUp()
	{
		$this->productRepository = new ApiProductRepository(
			Mockery::mock(\GuzzleHttp\Client::class),
			Mockery::mock(\Application\Api\ResponseSanitizer::class)
		);
	}

	public function testTrue()
	{
		$this->assertTrue(false);
	}
}
