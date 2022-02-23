<?php

namespace App\Controller;

use App\Entity\Hackathons;
use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CreationController extends AbstractController
{
    /**
     * @Route("/creationCompte", name="creationCompte")
     */
    public function index(PdoHackathons $pdo): JsonResponse
    {
        return $this->render('hackathon/index.html.twig', [
            'hackathon' => $pdo -> getLesHackathons(),
        ]);
    }
}
