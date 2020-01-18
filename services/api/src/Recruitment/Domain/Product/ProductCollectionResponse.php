<?php
declare(strict_types=1);

namespace Product;

class ProductCollectionResponse
{
	/**
	 * @var Product[]
	 */
	private $items;

	/**
	 * ProductCollectionResponse constructor.
	 * @param Product[] $items
	 */
	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function addItem(Product $product)
	{
		$this->items[] = $product;
	}

	public function count(): int
	{
		return count($this->items);
	}

	public function toArray(): array
	{
		return array_map(
			function($product)
			{
				return $product->toArray();
			},
			$this->items
		);
	}
}
