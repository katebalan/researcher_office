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

//        $response = $this->client->request(
//            'GET',
//            'https://api.rozklad.org.ua/v2/teachers/'. $fullName . '/lessons'
//        );
        $response = $this->client->request(
            $method,
            $url
        );

        return $response;
    }
}
