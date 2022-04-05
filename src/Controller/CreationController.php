<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Entity\Participation;
use App\Repository\HackathonRepository;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreationController extends AbstractController
{

    /**
     * @Route("/creationCompte", name="creationCompte")
     */
    public function add(Request $request): Response
    {
        $unparticipant = new Participant();
        $form = $this->createForm(RegisterType::class, $unparticipant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $e = $this->getDoctrine()->getManager();
            $e->persist($unparticipant);
            $e->flush();
            return $this->redirectToRoute('hackathon');
        }

        return $this->render('security/register.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }


    /**
     * @Route("inscriptionH/{id}", name="inscriptionH")
     */
    public function inscriptionH($id): Response
    {
        
        $participation = new Participation();
        $participation->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        $participation->setIdparticipant($this->getUser());
        $participation->setDateinscription(new \DateTime(date("D, d M Y H:i:s")));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($participation);
        $entityManager->flush();

        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $nb = $repository->findByNbPlaces($id);
        var_dump($nb);
        // die;
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("favori/{id}", name="favori")
     */
    public function favori($id): Response
    {
        $favori = new Favori();
        $favori->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        $favori->setIdparticipant($this->getUser());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($favori);
        $entityManager->flush();

       
        return $this->render('hackathon/unHackathon.html.twig');
    }
}
