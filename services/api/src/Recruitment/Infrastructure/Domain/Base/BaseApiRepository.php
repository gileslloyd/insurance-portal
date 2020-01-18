<?php
declare(strict_types=1);

namespace Infrastructure\Domain\Base;

use GuzzleHttp\Client;

abstract class BaseApiRepository
{
	/**
	 * @var Client
	 */
	protected $client;

	const BASE_URL = 'https://www.itccompliance.co.uk';

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => self::BASE_URL,
			'timeout'  => 2.0,
		]);
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
