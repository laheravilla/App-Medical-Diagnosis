<?php

namespace App\Controller;

use App\Entity\Issue;
use App\Entity\Specialisation;
use App\Repository\IssueRepository;
use App\Repository\SpecialisationRepository;
use App\Repository\SymptomRepository;
use App\Service\Client;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiController extends AbstractController
{
    /**
     * @param SymptomRepository $symptomRepository
     * @Route("/api/symptoms", name="api_symptoms")
     * @return Response
     */
    public function showAllSymptoms(SymptomRepository $symptomRepository): Response
    {
        return $this->render('api/index.html.twig', [
            'symptoms' => $symptomRepository->findAll(),
        ]);
    }

    /**
     * @param IssueRepository $issueRepository
     * @Route("/api/issues", name="api_issues")
     * @return Response
     */
    public function showAllIssues(IssueRepository $issueRepository): Response
    {
        return $this->render('api/issues.html.twig', [
            'issues' => $issueRepository->findAll(),
        ]);
    }

    /**
     * @param Client $client
     * @param ObjectManager $manager
     * @param SpecialisationRepository $specialisationRepository
     * @Route("/api/specialisations", name="api_specialisations")
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAllSpecialisations(
        Client $client,
        ObjectManager $manager,
        SpecialisationRepository $specialisationRepository
    ): Response {

        $responseSpecialisations = $client->getClient()->request(
            'GET',
            Specialisation::URL_ALL_SPECIALISATIONS,
            [
                'timeout' => 3
            ]
        );

        if (200 !== $responseSpecialisations->getStatusCode()) {
            throw new Exception('An error has occurred...');
        } else {
            $contentSpecialisations = $responseSpecialisations->getContent();
        }

        $contentSpecialisations = $responseSpecialisations->toArray();

        for ($i = 0; $i < count($contentSpecialisations); $i++) {
            $specialisation = new Specialisation();
            $specialisation->setName($contentSpecialisations[$i]['Name']);
            $specialisation->setSpecialisationId($contentSpecialisations[$i]['ID']);
            $manager->persist($specialisation);
            $manager->flush();
        }

        return $this->render('api/specialisations.html.twig', [
            'specialisations' => $specialisationRepository->findAll(),
        ]);
    }
}
