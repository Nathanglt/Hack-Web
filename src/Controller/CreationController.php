<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\RegisterType;
use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $form= $this ->createForm(RegisterType::class, $unparticipant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form-> isValid())
        {
            $e=$this->getDoctrine()->getManager();
            $e->persist($unparticipant);
            $e->flush();
            return $this->redirectToRoute('hackathon');
        }

        return $this->render('security/register.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }

      /**
     * @Route("/inscriptionH", name="inscriptionH")
     */
    public function inscriptionH(): Response
    {
        $unparticipant = new Participant();
        $i=$this -> getUser(); 
        $i->persist($unparticipant);
        $i->flush();
        return $this->redirectToRoute('hackathon');
       
    }

}
