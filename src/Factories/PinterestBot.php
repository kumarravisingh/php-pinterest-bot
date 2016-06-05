<?php

namespace seregazhuk\PinterestBot\Factories;

use seregazhuk\PinterestBot\Api\CurlAdapter;
use seregazhuk\PinterestBot\Api\ProvidersContainer;
use seregazhuk\PinterestBot\Api\Request;
use seregazhuk\PinterestBot\Api\Response;
use seregazhuk\PinterestBot\Bot;

class PinterestBot
{
    /**
     * Initializes Bot instance and all
     * its dependencies.
     *
     * @param string $userAgent
     *
     * @return Bot
     */
    public static function create($userAgent = "")
    {
        $request = new Request(new CurlAdapter());
        if (!empty($userAgent)) {
            $request->setUserAgent($userAgent);
        }
        
        $response = new Response();
        $providersContainer = new ProvidersContainer($request, $response);

        return new Bot($providersContainer);
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}