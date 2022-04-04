<?php

namespace App\Repository;

use App\Entity\Hackathon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\AST\Join;
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

    // /**
    //  * @return Hackathon[] Returns an array of Hackathon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hackathon
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAll()
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();;
    }

    public function findByNbPlaces($id): ?Hackathon
    {
        // return $this->createQuery('SELECT (hackathon.NbPlaces - COUNT(IdParticipation))  FROM participation 
        // INNER JOIN participation ON participation.IdHackathon = hackathon.IdHackathon
        // WHERE hackathon.IdHackathon = ' . $id)
        //     ->getResult();

            return $this->createQueryBuilder('h')
            ->select('h.NbPlaces - COUNT(p.IdParticipation)')
            ->innerJoin(Participation::class, 'p', Join::WITH, 'h.IdHackathon = p.IdHackathon')
            ->andWhere('h.IdHackathon = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
}
