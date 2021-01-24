<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class ApiService
{
    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    /**
     * @param $method
     * @param $url
     *
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function send($method, $url)
    {
        $response = $this->client->request(
            $method,
            $url
        );

        if ($response->getStatusCode() != 200) {
            throw new NotAcceptableHttpException($url . ' is broken');
        }

        return $response;
    }
}
