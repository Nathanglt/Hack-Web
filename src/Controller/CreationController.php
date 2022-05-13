<?php

namespace App\Controller;

use App\Repository\FavoriRepository;
use App\Entity\Favori;
use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Entity\Participation;
use App\Service\PdoHackathons;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreationController extends AbstractController
{




    /**
     * @Route("inscriptionH/{id}", name="inscriptionH")
     */
    public function inscriptionH($id): Response
    {
        $hackathon = $this->getDoctrine()->getRepository(Hackathon::class)->find($id);
        $participation = new Participation();
        $participation->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        $participation->setIdparticipant($this->getUser());
        $participation->setDateinscription(new \DateTime(date("Y-m-d H:i:s")));
        $entityManager = $this->getDoctrine()->getManager();


        if ($hackathon->getDatelimite() >= date("Y-m-d H:i:s")) { //teste si la date du hackathon sur lequel l'utiisateur veux s'inscrire n'est pas dépassée

            $entityManager->persist($participation);
            $entityManager->flush();
            $repository = $this->getDoctrine()->getRepository(Hackathon::class);
            $repository->findByNbPlaces($id);
            echo ('<div class="alert alert-success" role="alert">Inscription effectuée</div>'); //affiche un message sur la page du navigateur
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
        $veriffav = $this->getDoctrine()->getRepository(Hackathon::class)->findByVerifFavori($this->getUser(), $id);
        if ($veriffav == []) { //vérifie que le favori n'a pas déja été ajouté par l'utilisateur grâce à une comparaison avec une requete sql qui retour un tableau vide si il n'a pas été ajouté
            $entityManager->persist($favori);
            $entityManager->flush();
            echo ('<div class="alert alert-success" role="alert">Favori ajouté</div>');
            return $this->render('home/index.html.twig', []);
        } else {
            echo ('<div class="alert alert-warning" role="alert">Favori deja ajouté</div>');
            return $this->render('home/index.html.twig', []);
        }
    }

    /**
     * @Route("delfavori/{id}", name="delfavori")
     */

    public function delfavori($id): Response
    {
        dump($id);
        $repository = $this->getDoctrine()->getRepository(Favori::class);
        $em = $this->getDoctrine()->getManager();
        $leFavori = $repository->find($id);
        dump($leFavori);
        $em->remove($leFavori); //supprime le favori dont l'id = $id grâce à la fonction remove de doctrine
        $em->flush();
        echo ('<div class="alert alert-danger" role="alert">Favori supprimer</div>');
        return $this->render('home/index.html.twig');

    }
}
