<?php

namespace App\Controller;

use App\Entity\Favori;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/list", name="list")
     */
    public function list(): Response
    {
        return $this->render('home/list.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(): Response
    {
        return $this->render('security\register.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/favori", name="favori")
     */
    public function getlesfavoris(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Favori::class);
        $favori = $repository->findAll();
        return $this->render('home/viewFavori.html.twig', ['lesfavoris'=>$favori]);
    }
}
