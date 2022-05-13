<?php

namespace App\Controller;

use App\Entity\Hackathons;
use App\Entity\Participant;
use App\Entity\Participantevenement;
use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

class ApiController extends AbstractController
{

//permet de récupérer les hackathons pour les chargés dans un tableau json
    /**
     * @Route("/apiH", name="apiH", methods="GET")
     */
    public function getListeHackathons(PdoHackathons $monPdo): JsonResponse
    {
        $lesHackathons = $monPdo->getLesHackathons();
        $tabJson=[];
        foreach ($lesHackathons as $unHackathon){
            $tabJson[]=[
                'id_hackathon'=>$unHackathon->getIdHackathon(),
                'date_debut'=>$unHackathon->getDateDebut(),
                'date_fin'=>$unHackathon->getDateFin(),
                'date_limite'=> $unHackathon ->getDateLimite(),
                'heure_debut'=>$unHackathon->getHeureDebut(),
                'heure_fin'=> $unHackathon ->getHeureFin(),
                'lieu'=>$unHackathon->getLieu(),
                'rue'=>$unHackathon->getRue(),
                'ville' => $unHackathon ->getVille(),
                'code_postal'=>$unHackathon->getCodePostal(),
                'theme'=>$unHackathon->getTheme(),
                'nb_places' => $unHackathon ->getNbPlaces(),
                'image' => $unHackathon ->getImage(),
            ];
        }
        return new JsonResponse($tabJson);
    }


    /**
     * @Route("/apiE", name="apiE", methods="GET")
     */
    public function getListeEvenement(PdoHackathons $monPdo): JsonResponse
    {
        $lesEvenements = $monPdo->getLesEvenements();
        $tabJson=[];
        foreach ($lesEvenements as $unEvenement){
            $tabJson[]=[
                'IdEvenement'=>$unEvenement->getIdEvenement(),
                'Theme'=>$unEvenement->getTheme(),
                'Date'=>$unEvenement->getDate(),
                'HeureDebut'=>$unEvenement->getHeureDebut(),
                'HeureFin'=>$unEvenement->getHeureFin(),
                'IdHackathon '=>$unEvenement->getIdHackathon(),
                'Typeevenement'=>$unEvenement->getIdtypeevenement(),
            ];
        }
        return new JsonResponse($tabJson);
    }

/**
     * @Route("/apiE/{id}", name="apiE_id", methods="GET")
     */
    public function getEvenement(PdoHackathons $monPdo, $id): JsonResponse
    {
      
        $lesEvenements = $monPdo->getEvenement($id);
        $tabJson=[];
        if(empty($lesEvenements))
        {
            return new JsonResponse(['message' => 'Pas trouve'],Response::HTTP_NOT_FOUND);
        } 
        foreach ($lesEvenements as $unEvenement){         
        $tabJson[]=[
            'IdEvenement'=>$unEvenement->getIdEvenement(),
            'Theme'=>$unEvenement->getTheme(),
            'Date'=>$unEvenement->getDate(),
            'HeureDebut'=>$unEvenement->getHeureDebut(),
            'HeureFin'=>$unEvenement->getHeureFin(),
            'IdHackathon '=>$unEvenement->getIdHackathon(),
            'Typeevenement'=>$unEvenement->getIdtypeevenement(),
        ];
        
    }
    return new JsonResponse($tabJson);
}

 /**
      * @Route("/apiE/participant", name="participant", methods="POST")
      */
      public function newParticipant(Request $request, PdoHackathons $monPdo)
      {
          $content = $request->getContent();
          dump($content);
          if(!empty($content))
         {
            $tabd = json_decode($content, true) ;
            dump($tabd);
            $p = new Participantevenement($tabd);
            dump($p);
            $monPdo -> setParticipation($p);
         }            
          return new JsonResponse(Response::HTTP_ACCEPTED);
      }
}