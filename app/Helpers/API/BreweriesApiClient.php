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

    public function sendRequest($method, $uri, array $queryParams=[], array $formData = []){
        try {
            $resp = $this->client->request($method, $uri, [
                'query'=>$queryParams,
                'form_params'=>$formData
            ]);
            return [
                'status'=>$resp->getStatusCode(),
                'body'=>json_decode($resp->getBody()->getContents(), true)
            ];
        }catch (\Exception $exception){
            return [
                'status'=>'',
                'body'=> $exception->getMessage()
            ];
        }
    }
}
