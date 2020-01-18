<?php
declare(strict_types=1);

namespace Infrastructure\Domain\Base;

use Application\Api\ResponseSanitizer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Product\ProductInfoUnavailableException;

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

	protected function getFromApi(string $url, string $expectedRoot): array
	{
		try {
			do {
				$data = (string)$this->client
					->get($url)
					->getBody();

				$data = json_decode($data, true);
			} while (isset($data['error']) && !isset($data[$expectedRoot]));

			return $this->responseSanitizer->sanitizeArray($data[$expectedRoot]);
		} catch (ClientException $e) {
			// @todo Log error
			throw new ProductInfoUnavailableException();
		}
	}
}
