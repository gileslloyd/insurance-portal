<?php
declare(strict_types=1);

namespace Infrastructure\Domain\Product;

use Infrastructure\Domain\Base\BaseApiRepository;
use Product\Product;
use Product\ProductRepository;

class ApiProductRepository extends BaseApiRepository implements ProductRepository
{
	public function getAll(): array
	{
		// TODO: Implement getAll() method.
	}

	public function getByID(string $id): Product
	{
		// TODO: Implement getByID() method.
	}
}
