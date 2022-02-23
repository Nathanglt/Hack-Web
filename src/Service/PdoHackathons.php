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

	function getUnEvenement($id)
	{
		$req = "SELECT * FROM evenement where id=:idHackathon";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindParam(':idHackathon',$id);
		$res->execute();
		$laLigne = $res->fetch();
		 if ($laLigne==false){
			$evenement = null;
		 } 
		 else{
			$evenement = new Evenement ($laLigne);
		 } 

		return $evenement;
	}
}
