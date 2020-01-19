<?php

namespace Product;

interface ProductRepository
{
    public function getAll(): array;

    public function getByID(string $id): Product;
}
