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
		try {
			$products = [];

			$list = $this->getFromApi('/recruitment-webservice/api/list', 'products') ?? [];

			foreach ($list as $id => $name) {
				$products[] = $this->getByID($id);
			}
		} catch (\Exception $e) {
			var_dump($e->getMessage()); die;
		}

		return $products;
	}

	public function getByID(string $id): Product
	{
		$details = $this->getFromApi("/recruitment-webservice/api/info?id={$id}", $id) ?? [];

		return new Product(
			$id,
			$details['name'] ?? '',
			$details['description'] ?? '',
			$details['type'] ?? '',
			$details['suppliers'] ?? []
		);
	}
}
