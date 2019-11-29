<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;

class ApiService
{
    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function send($method, $url)
    {
        $response = $this->client->request(
            $method,
            $url
        );

        return $response;
    }
}
