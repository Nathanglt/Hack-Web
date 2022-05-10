<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Entity\Hackathon;
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
     * @Route("/favori", name="vfavori")
     */
    public function getlesfavoris(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $f = $repository->findByFavori($this->getUser());
        return $this->render('home/Favori.html.twig', ['lesfavoris'=>$f]);
    }
}
