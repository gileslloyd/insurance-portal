<?php
declare(strict_types=1);

namespace Infrastructure\Domain\Base;

use Application\Api\ResponseSanitizer;
use GuzzleHttp\Client;

abstract class BaseApiRepository
{
	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * @var ResponseSanitizer
	 */
	protected $responseSanitizer;

	public function __construct(Client $client, ResponseSanitizer $responseSanitizer)
	{
		$this->client = $client;
		$this->responseSanitizer = $responseSanitizer;
	}

	protected function getFromApi(string $url): array
	{
		do {
			$data = (string) $this->client
				->get($url)
				->getBody();

			$data = json_decode($data, true);
		} while (isset($data['error']));

		return $data;
	}
}
