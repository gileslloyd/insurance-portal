<?php
declare(strict_types=1);

namespace Infrastructure\Domain\Base;

use GuzzleHttp\Client;

abstract class BaseApiRepository
{
	private Client $client;

	const BASE_URL = 'https://www.itccompliance.co.uk/recruitment-webservice/api';

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => self::BASE_URL,
			'timeout'  => 2.0,
		]);
	}
}
