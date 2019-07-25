<?php


namespace App\Service;

use App\Entity\Issue;
use App\Entity\Specialisation;
use App\Entity\Symptom;
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

class SymptomsCheckerApi extends AbstractController
{
    /**
     * @param Client $client
     * @param ObjectManager $manager
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @Route("/gettingSymptoms")
     */
    public function getAllSymptoms(
        Client $client,
        ObjectManager $manager
    ): Response {

        $responseSymptoms = $client->getClient()->request(
            'GET',
            Symptom::URL_ALL_SYMPTOMS,
            [
                'timeout' => 3
            ]
        );

        if (200 !== $responseSymptoms->getStatusCode()) {
            throw new Exception('An error has occurred...');
        } else {
            $contentSymptoms = $responseSymptoms->getContent();
        }

        $contentSymptoms = $responseSymptoms->toArray();

        for ($i = 0; $i < count($contentSymptoms); $i++) {
            $symptom = new Symptom();
            $symptom->setName($contentSymptoms[$i]['Name']);
            $symptom->setSymptomId($contentSymptoms[$i]['ID']);
            $manager->persist($symptom);
            $manager->flush();
        }

//        return $this->render('index.html.twig', [
//            'symptom' => $symptom
//        ]);
    }

    /**
     * @param Client $client
     * @param ObjectManager $manager
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @Route("/gettingIssues")
     */
    public function getAllIssues(
        Client $client,
        ObjectManager $manager
    ): Response {

        $responseIssues = $client->getClient()->request(
            'GET',
            Issue::URL_ALL_ISSUES,
            [
                'timeout' => 3
            ]
        );

        if (200 !== $responseIssues->getStatusCode()) {
            throw new Exception('An error has occurred...');
        } else {
            $contentIssues = $responseIssues->getContent();
        }

        $contentIssues = $responseIssues->toArray();

        for ($i = 0; $i < count($contentIssues); $i++) {
            $issue = new Issue();
            $issue->setName($contentIssues[$i]['Name']);
            $issue->setIssueId($contentIssues[$i]['ID']);
            $manager->persist($issue);
            $manager->flush();
        }

//        return $this->render('index.html.twig', [
//            'issue' => $issue
//        ]);
    }

    /**
     * @param Client $client
     * @param ObjectManager $manager
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAllSpecialisations(
        Client $client,
        ObjectManager $manager
    ): Response {

        $responseSpecialisations = $client->getClient()->request(
            'GET',
            Issue::URL_ALL_ISSUES,
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

//        return $this->render('index.html.twig', [
//            'specialisation' => $specialisation
//        ]);
    }
}
