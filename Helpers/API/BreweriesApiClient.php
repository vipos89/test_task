<?php

namespace App\Helpers\API;

use GuzzleHttp\Client;

class BreweriesApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
           'base_uri'=>env('BREWERIES_API_BASE_URL', 'https://api.openbrewerydb.org/')
        ]);
    }
}
