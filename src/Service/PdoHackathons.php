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

		$serveur = 'mysql:host=192.168.4.1:3306';
		$bdd = 'dbname=bdaabderrahmann7';
		$user = 'sqlaabderrahmann';
		$mdp = 'savary';
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
		$res->bindParam(':id', $id);
		$res->execute();
		$lesLignes = $res->fetchAll();
		$evenement = [];
		foreach ($lesLignes as $uneLigne) {
			$evenement[] = new Evenement($uneLigne);
		}

		return $evenement;
	}

	public function setParticipation($p)
	{

		$req = "insert into participantevenement(Nom, Prenom, Mail, IdEvenement) values(:nom,:prenom,:Mail,:IdEvenement)";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindValue(':nom', $p->getNom());
		$res->bindValue(':prenom', $p->getPrenom());
		$res->bindValue(':Mail', $p->getMail());
		$res->bindValue(':IdEvenement', $p->getIdevenement());
		$res->execute();
		dump($req);
		PdoHackathons::$monPdo->exec($req);
	}

	public function setParticipationH($idH, $idP, $Date)
	{

		$req = "insert into participation(IdHackathon, IdParticipant, DateInscription) values(:idH,:idP,:Date)";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindValue(':idH', $idH);
		$res->bindValue(':idP', $idP);
		$res->bindValue(':Date', $Date);
		$res->execute();
	}

	public function delFavori($idH, $idP)
	{
		$req = "DELETE FROM `favori` WHERE favori.IdHackathon = :idH AND favori.IdParticipant = :idP";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindValue(':idH', $idH);
		$res->bindValue(':idP', $idP);
		$res->execute();
	}
	public function selectFav($idH)
	{
		$req = "SELECT DISTINCT favori.IdParticipant FROM `favori` WHERE favori.IdHackathon = :idH";
		$res = PdoHackathons::$monPdo->prepare($req);
		$res->bindValue(':idH', $idH);
		$res->execute();
	}
}
