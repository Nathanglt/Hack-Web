<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    // /**
    //  * @Route("/hackathon", name="hackathon")
    //  */
    // public function index(PdoHackathons $pdo): Response
    // {
    //     return $this->render('hackathon/index.html.twig', [
    //         'hackathon' => $pdo -> getLesHackathons(),
    //     ]);
    // }

    /**
     * @Route("/hackathon", name="cardH")
     */
    public function cardH(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->findAll();
        return $this->render('hackathon/index.html.twig', ['leshackathons'=>$hackathon]);
    }

     /**
     * @Route("/hackathon/{id}", name="unHackathon")
     */
    public function unHackathon($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $h = $repository->find($id);

        if ($h==null)
        {
        throw $this->createNotFoundException('Hackathon inconnu');
        }

        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $nb = $repository->findByNbPlaces($id);
        return $this->render('hackathon/unHackathon.html.twig', [
            'h' => $h, 'nb' => $nb

        ]);
    }

    /**
     * @Route("/recherche", name="recherche")
     */
    public function recherche(): Response
    {
        return $this->render('hackathon\recherche.html.twig', [
            'controller_name' => 'HackathonController',
        ]);
    }

}
