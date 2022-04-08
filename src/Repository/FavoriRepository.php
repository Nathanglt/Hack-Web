<?php

namespace App\Repository;

use App\Entity\Favori;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Favori|null find($id, $lockMode = null, $lockVersion = null)
 * @method Favori|null findOneBy(array $criteria, array $orderBy = null)
 * @method Favori[]    findAll()
 * @method Favori[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Favori::class);
    }

    public function findAll()
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();;
    }

    public function findByDelFavori($idhack,$idparti)
    {
            return $this->createQueryBuilder('f')
            ->delete()
            ->andWhere('f.idparticipant = :idparticipant')
            ->andWhere('f.idhackathon = :idhackathon')
            ->setParameter('idhackathon', $idhack)
            ->setParameter('idparticipant', $idparti)
            ->getQuery()
            ->getResult();
    }



   
}