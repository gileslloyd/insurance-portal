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
		[
			'api_client',
			new \Application\Api\ResponseSanitizer(),
		]
	],
	'api_client' => [
		\GuzzleHttp\Client::class,
		[
			(new \Configuration('api'))->getAll(),
			\Application\Api\ResponseSanitizer::class,
		],
	],
];
