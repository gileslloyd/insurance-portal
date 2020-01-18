<?php
declare(strict_types=1);

namespace Base;

abstract class DomainException extends \Exception
{
	public function getHttpCode(): int
	{
		return static::HTTP_CODE;
	}
}
