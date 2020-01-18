<?php
declare(strict_types=1);

namespace Product;

use Base\DomainException;

class ProductNotFoundException extends DomainException
{
	const HTTP_CODE = 404;

	protected $message = 'The requested product was not found';
}
