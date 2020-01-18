<?php
declare(strict_types=1);

namespace Application\Api;

class ResponseSanitizer
{
	public function sanitizeString(string $value): string
	{
		return filter_var($value, FILTER_SANITIZE_STRING);
	}

	public function sanitizeArray(array $values): array
	{
		return array_map(
			function ($value) {
				return $this->sanitizeValue($value);
			},
			$values
		);
	}

	private function sanitizeValue($value)
	{
		switch (gettype($value)) {
			case 'string':
				return $this->sanitizeString($value);
			case 'array':
				return $this->sanitizeArray($value);
			default:
				throw new \RuntimeException('Unexpected value type');
		}
	}
}
