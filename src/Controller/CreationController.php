<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Entity\Participation;
use App\Service\PdoHackathons;
use App\Repository\HackathonRepository;
use App\Form\RegisterType;
use App\Repository\FavoriRepository;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;

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
        $hackathon = $this->getDoctrine()->getRepository(Hackathon::class)->find($id);
        $participation = new Participation();
        $participation->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        $participation->setIdparticipant($this->getUser());
        $participation->setDateinscription(new \DateTime(date("D, d M Y H:i:s")));
        $entityManager = $this->getDoctrine()->getManager();

        if ($hackathon->getDatelimite() <= date("D, d M Y H:i:s")) {

            $entityManager->persist($participation);
            $entityManager->flush();
            $repository = $this->getDoctrine()->getRepository(Hackathon::class);
            $repository->findByNbPlaces($id);
            echo ('<div class="alert alert-success" role="alert">Inscription effectuée</div>');
            return $this->render('home/index.html.twig');
        } else {
           
            echo ('<div class="alert alert-danger" role="alert">Inscription impossible car la date limite est dépassée</div>');
            return $this->render('home/index.html.twig');
        }
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
        echo ('<div class="alert alert-success" role="alert">Favori ajouté</div>');

        return $this->render('home/index.html.twig', []);
    }

     /**
     * @Route("delfavori/{id}", name="delfavori")
     */
    public function delfavori($id,PdoHackathons $monPdo): Response
    {
    $iduser = 1;
    // $iduser = $this->getUser();
    $monPdo -> delFavori($id,$iduser);
    echo ('<div class="alert alert-danger" role="alert">Favori supprimer</div>');
    return $this->render('home/index.html.twig');
    }



}
