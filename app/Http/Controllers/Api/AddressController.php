<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class AddressController extends Controller
{
    public function getAddress($zipcode, $number)
    {
        $client = new Client(['http_errors' => false]);

        $response = $client->request('GET', 'http://json.api-postcode.nl/', [
            'headers' => ['token' => '24ba23c9-1581-4156-aa8f-f8e0da5dabe2'],
            'query' => ['postcode' => $zipcode, 'number' => $number],
        ]);

        return $response->getBody();
    }
}
