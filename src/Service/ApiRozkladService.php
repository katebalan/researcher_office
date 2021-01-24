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
    /*
            "php": "^7.1.3",
        "ext-ctype": "*",
        "ext-iconv": "*",
        "friendsofsymfony/ckeditor-bundle": "^2.1",
        "phpoffice/phpspreadsheet": "^1.9",
        "phpoffice/phpword": "^0.17.0",
        "sensio/framework-extra-bundle": "^5.4",
        "sensiolabs/security-checker": "^6.0",
        "symfony/apache-pack": "^1.0",
        "symfony/asset": "4.4.*",
        "symfony/console": "4.4.*",
        "symfony/dotenv": "4.4.*",
        "symfony/expression-language": "4.4.*",
        "symfony/flex": "^1.3.1",
        "symfony/form": "4.4.*",
        "symfony/framework-bundle": "4.4.*",
        "symfony/http-client": "4.4.*",
        "symfony/orm-pack": "^1.0",
        "symfony/security": "4.4.*",
        "symfony/security-bundle": "4.4.*",
        "symfony/translation": "4.4.*",
        "symfony/twig-bundle": "4.4.*",
        "symfony/validator": "4.4.*",
        "symfony/webpack-encore-bundle": "^1.6",
        "symfony/yaml": "4.4.*"
    },
    "require-dev": {
        "doctrine/doctrine-fixtures-bundle": "^3.2",
        "symfony/debug-pack": "^1.0",
        "symfony/maker-bundle": "^1.13",
        "symfony/profiler-pack": "^1.0"
    },
     */
}
