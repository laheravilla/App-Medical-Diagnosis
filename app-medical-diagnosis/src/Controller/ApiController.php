<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    const URL_ALL_SYMPTOMS = 'https://api.infermedica.com/v2/symptoms';
    const URL_ALL_CONDITIONS = 'https://api.infermedica.com/v2/conditions';
    const CONTENT_TYPE = 'application/json';



    /**
     * @Route("/api/symptoms", name="api_symptoms")
     */
    public function index()
    {
        $httpClient = HttpClient::create([
            'headers' => [
                'App-Id' => $this->getParameter('app_id'),
                'App-Key' => $this->getParameter('app_key'),
                'Content-Type' => self::CONTENT_TYPE,
            ]
        ]);

        $responseSymptoms = $httpClient->request('GET', self::URL_ALL_SYMPTOMS, ['timeout' => 2.5]);

        if (200 !== $responseSymptoms->getStatusCode()) {
            throw new Exception('Loading...');
        } else {
            $contentSymptoms = $responseSymptoms->getContent();
        }

        $contentSymptoms = $responseSymptoms->toArray();

        return $this->render('api/index.html.twig', [
            'symptoms' => $contentSymptoms,
        ]);
    }
}
