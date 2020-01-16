<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use League\Container\Container;
use League\Tactician\CommandBus;

class Controller extends BaseController
{
	/**
	 * @var Container
	 */
    protected $container;

	/**
	 * @var CommandBus
	 */
    protected $command_bus;

    public function __construct()
	{
		$this->container = \Di\Container::instance();
		$this->command_bus = \CommandBus::instance();
	}
}
