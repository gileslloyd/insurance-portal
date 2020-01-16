<?php
declare(strict_types=1);

namespace Product;

class ProductService
{
	private ProductRepository $productRepository;

	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function getAll()
	{
		return $this->productRepository->getAll();
	}
}