<?php


namespace App\Service;

use App\Entity\Api;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client extends AbstractController
{
    /**
     * @return HttpClientInterface
     */
    public function getClient(): HttpClientInterface
    {
        $client = HttpClient::create([
            'headers' => [
                'X-RapidAPI-Host' => Api::RAPID_API_HOST,
                'X-RapidAPI-Key' => $this->getParameter('rapid_api_key'),
                'Content-Type' => Api::CONTENT_TYPE,
            ]
        ]);
        return $client;
    }
}
