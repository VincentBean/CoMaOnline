<?php

use GuzzleHttp\Client;
use Orchestra\Parser\Xml\Facade as XmlParser;

if (! function_exists('getData')) {
    function getData($route) {
        $client = new Client(['http_errors' => false]);

        $options = [
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8',
            ]
        ];

        $response = $client->request('GET', env('API_BASE_URL') . $route, $options);

        return $response->getBody();
    }
}

if (! function_exists('postData')) {
    function postData($route) {
        $client = new Client(['http_errors' => false]);
        $response = $client->request('post', env('API_BASE_URL'));

        return $response->getBody();
    }
}

?>