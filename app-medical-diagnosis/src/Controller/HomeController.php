<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\SymptomRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/", name="home")
     * @return Response
     */
    public function index(Request $request, SymptomRepository $symptomRepository, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $symptomsFound = $symptomRepository->findBy($data['search']);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
            'users' => $userRepository->findAllWithSymptoms(),
//            'symptomsFound' => $symptomsFound ?? []
        ]);
    }
}
