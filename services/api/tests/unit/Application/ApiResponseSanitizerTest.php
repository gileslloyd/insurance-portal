<?php
declare(strict_types=1);

use Application\Api\ResponseSanitizer;

class ApiResponseSanitizerTest extends PHPUnit\Framework\TestCase
{
	/**
	 * @var ResponseSanitizer
	 */
	private $responseSanitizer;

	public function setUp()
	{
		$this->responseSanitizer = new ResponseSanitizer();
	}

	/**
	 * @dataProvider invalidTypes
	 * @param $value
	 */
	public function testWeGetAnExceptionForUnexpectedValueTypes($value)
	{
		$this->expectException(RuntimeException::class);

		$this->responseSanitizer->sanitizeArray([$value]);
	}

	/**
	 * @dataProvider stringsToClean
	 */
	public function testStringsAreProperlySanitized(string $dirty, string $clean)
	{
		$this->assertSame(
			$clean,
			$this->responseSanitizer->sanitizeString($dirty)
		);
	}

	public function testArraysAreProperlySanitized()
	{
		$dirty_array = ['test <b>1</b>', 'test <b>2</b>', ['test <b>3</b>', 'test <b>4</b>']];
		$clean_array = ['test 1', 'test 2', ['test 3', 'test 4']];

		$sanitizedArray = $this->responseSanitizer->sanitizeArray($dirty_array);

		$this->assertCleanArray($clean_array, $sanitizedArray);
	}

	public function invalidTypes(): array
	{
		return [
			[1],
			[1.4],
			[true],
			[null],
			[new \DateTimeImmutable()],
		];
	}

	public function stringsToClean(): array
	{
		return [
			['Bricks n\' Mortar Protect 4U', 'Bricks n&#39; Mortar Protect 4U'],
			['SuperInsure<span style=\"display: none\">78a1bc9e567fa197bb3</div>', 'SuperInsure78a1bc9e567fa197bb3'],
			[' \"Comprehensive car insurance\"', '\&#34;Comprehensive car insurance\&#34;'],
			['Test with more <b>html</b> tags', 'Test with more html tags'],
		];
	}

	private function assertCleanArray(array $expected, array $actual)
	{
		foreach ($actual as $key => $value) {
			if (is_array($value)) {
				$this->assertCleanArray($expected[$key], $value);
			} else {
				$this->assertSame($expected[$key], $value);
			}
		}
	}
}
