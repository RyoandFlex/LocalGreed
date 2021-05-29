<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/bienvenue", name="homeconnect")
     * @IsGranted("ROLE_USER")
     */
    public function indexconnect(): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('home/indexconnect.html.twig', [
            'user' => $user,
        ]);
    }
}

    
