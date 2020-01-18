<?php

return [
	'product_service' => [
		\Product\ProductService::class,
		[
			'product_repository',
		]
	],
	'product_repository' => [
		\Infrastructure\Domain\Product\ApiProductRepository::class,
		[]
	]
];
