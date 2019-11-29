<?php


namespace App\Service;


class ApiRozkladService
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getChoice($id)
    {
        $response = $this->apiService->send(
            'GET',
            'http://api.rozklad.org.ua/v2/teachers/' . $id
        );
        $data = json_decode($response->getContent());

        return [$data->data->teacher_name => $id];
    }

    /**
     * @param $id
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getLessons($id)
    {
        $response = $this->apiService->send(
            'GET',
            'https://api.rozklad.org.ua/v2/teachers/'. $id . '/lessons'
        );

        return $response->toArray();
    }
}
