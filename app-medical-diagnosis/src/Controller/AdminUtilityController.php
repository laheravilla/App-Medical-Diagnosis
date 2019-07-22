<?php


namespace App\Controller;

use App\Repository\SymptomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminUtilityController extends AbstractController
{
    /**
     * @param SymptomRepository $symptomRepository
     * @Route("/admin/utility/symptoms", name="admin_utility_symptoms", methods="GET")
     * @return Response
     */
    public function getSymptoms(SymptomRepository $symptomRepository): Response
    {
        $symptoms = $symptomRepository->findAll();

        return $this->json([
            'symptoms' => $symptoms
        ], 200, [], ['groups' => ['main']]);
    }
}
