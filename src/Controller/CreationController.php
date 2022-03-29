<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Service\PdoHackathons;
use App\Entity\Participant;
use App\Entity\Participation;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;
use Symfony\Component\VarDumper\VarDumper;
use App\Repository;

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
        $nb = $repository->updateNbPlaces($id);
        var_dump($nb);



        return $this->render('home/index.html.twig');
    }
}
