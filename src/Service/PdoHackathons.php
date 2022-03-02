<?php

namespace App\Service;

use PDO;
use App\Entity\Hackathon;
use App\Entity\Evenement;

class PdoHackathons
{
	private static $monPdo;


	public function __construct()
	{

		$serveur = 'mysql:host=127.0.0.1:3307';
		$bdd = 'dbname=hackathon';
		$user = 'root';
		$mdp = '';
		PdoHackathons::$monPdo = new PDO(
			$serveur . ';' . $bdd,
			$user,
			$mdp
		);
		PdoHackathons::$monPdo->query("SET CHARACTER SET utf8");
	}



	function getLesHackathons()
	{
		$req = "sELECT * FROM hackathon ";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		$hackathon = [];
		foreach ($lesLignes as $uneLigne) {
			$hackathon[] = new Hackathon($uneLigne);
		}

		return $hackathon;
	}

	function getLesEvenements()
	{
		$req = "SELECT * FROM evenement";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		$evenement = [];
		foreach ($lesLignes as $uneLigne) {
			$evenement[] = new Evenement($uneLigne);
		}

		return $evenement;
	}

	function getEvenement($id)
	{
		$req = "sELECT * FROM evenement where idhackathon=:id";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindParam(':id',$id);
		$res->execute();
		$lesLignes = $res->fetchAll();
		$evenement = [];
		foreach ($lesLignes as $uneLigne) {
			$evenement[] = new Evenement($uneLigne);
		}

		return $evenement;
	}
	public function setParticipation($p){

		$req = "insert into participationevenement(nom, prenom, Mail, IdEvenement) values(:nom,:prenom,:Mail,:IdEvenement)";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res -> bindValue(':nom',$p->getNom());
		$res -> bindValue(':prenom',$p->getPrenom());
		$res -> bindValue(':Mail',$p->getMail());
		$res -> bindValue(':IdEvenement',$p->getIdevenement());
		$res -> execute();
	   }
}
