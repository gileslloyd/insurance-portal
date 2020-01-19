<?php

declare(strict_types=1);

namespace Infrastructure\Domain\Product;

use Infrastructure\Domain\Base\BaseApiRepository;
use Product\Product;
use Product\ProductInfoUnavailableException;
use Product\ProductNotFoundException;
use Product\ProductRepository;

class ApiProductRepository extends BaseApiRepository implements ProductRepository
{
    private const NOT_FOUND_ERROR = 'Unknown product ID';

    public function getAll(): array
    {
        $products = [];

        $list = $this->getFromApi('/recruitment-webservice/api/list', 'products') ?? [];

        foreach ($list as $id => $name) {
            $products[] = $this->getByID($id);
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

    protected function inspectErrors(array $response): array
    {
        if (isset($response['error']) && ($response['error'] === static::NOT_FOUND_ERROR)) {
            throw new ProductNotFoundException();
        }

        return $response;
    }
}
