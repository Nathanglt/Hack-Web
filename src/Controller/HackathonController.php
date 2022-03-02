<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    /**
     * @Route("/hackathon", name="hackathon")
     */
    public function index(PdoHackathons $pdo): Response
    {
        return $this->render('hackathon/index.html.twig', [
            'hackathon' => $pdo -> getLesHackathons(),
        ]);
    }

    /**
     * @Route("/hackathon/inscription", name="inscriptionH")
     */
    public function inscriptionH(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->findAll();
        return $this->render('InscriptionHackathon/index.html.twig', ['leshackathons'=>$hackathon]);
    }

    
}
