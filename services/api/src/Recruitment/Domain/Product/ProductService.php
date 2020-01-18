<?php
declare(strict_types=1);

namespace Product;

class ProductService
{
	/**
	 * @var ProductRepository
	 */
	private $productRepository;

	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function getAll(): ProductCollectionResponse
	{
		return new ProductCollectionResponse(
			$this->productRepository->getAll()
		);
	}
}