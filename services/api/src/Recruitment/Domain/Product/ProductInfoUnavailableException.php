<?php
declare(strict_types=1);

namespace Product;

use Base\DomainException;

class ProductInfoUnavailableException extends DomainException
{
	const HTTP_CODE = 502;

	protected $message = 'Product information is currently unavailable. Please try later.';
}
