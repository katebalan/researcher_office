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
}
