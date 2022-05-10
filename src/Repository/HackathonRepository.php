<?php

namespace App\Repository;

use App\Entity\Favori;
use App\Entity\Hackathon;
use App\Entity\Participation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hackathon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hackathon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hackathon[]    findAll()
 * @method Hackathon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HackathonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hackathon::class);
    }

    public function findAll()
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();;
    }

    public function findByNbPlaces($id)
    {
            return $this->createQueryBuilder('h')
            ->select('(h.nbplaces - COUNT(p.idparticipation))')
            ->innerJoin(Participation::class, 'p', Join::WITH, 'h.idhackathon = p.idhackathon')
            ->andWhere('h.idhackathon = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByFavori($id)
    {
            return $this->createQueryBuilder('h')
            ->select('h.image,h.theme,f.idfavori')
            ->innerJoin(Favori::class, 'f', Join::WITH, 'h.idhackathon = f.idhackathon')
            ->andWhere('f.idparticipant = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

    }

    public function findByVerifFavori($idP,$idH)
    {
            return $this->createQueryBuilder('h')
            ->innerJoin(Favori::class, 'f', Join::WITH, 'h.idhackathon = f.idhackathon')
            ->andWhere('f.idparticipant = :idP and h.idhackathon = :idH')
            ->setParameter('idP', $idP)
            ->setParameter('idH', $idH)
            ->getQuery()
            ->getResult();

    }


}
