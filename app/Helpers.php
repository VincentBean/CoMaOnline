<?php

use GuzzleHttp\Client;
use Orchestra\Parser\Xml\Facade as XmlParser;

if (!function_exists('getData')) {
    function getData($route)
    {
        // original code from api call
        // $client = new Client(['http_errors' => false]);

        // $response = $client->request('GET', env('API_BASE_URL') . $route);

        // return $response->getBody();

        // modified code to display project on portfolio
        return env('APP_URL') . '/xml/' . $route . '.xml';
    }
}

if (!function_exists('xmlToJson')) {
    function xmlToJson($xml, $assoc = false)
    {
        $json = json_encode($xml);
        $jsonObj = json_decode($json, $assoc);

        return $jsonObj;
    }
}

if (!function_exists('currency')) {
    function currency($value)
    {
        $value = doubleval($value);
        if (\App::isLocale('en')) {
            return "&euro;&nbsp;" . number_format($value, 2, '.', ',');
        } else {
            return "&euro;&nbsp;" . number_format($value, 2, ',', '.');
        }
    }
}
