<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use League\Container\Container;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct()
    {
        $this->container = \DI\Container::instance();
    }

    protected function apiResponse(array $content, int $code): Response
    {
        return new Response(
            [
                'meta' => [
                    'code' => $code,
                ],
                'body' => $content,
            ],
            $code
        );
    }
}
