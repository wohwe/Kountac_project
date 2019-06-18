<?php

namespace Kountac\KountacBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SousAchatsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SousAchatsRepository extends EntityRepository
{
    public function getFacturebyUser($utilisateur)
    {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.utilisateur = :utilisateur')
                ->andWhere('u.valider = 1')
                ->andWhere('u.reference != 0')
                ->andWhere('u.effacer != 1')
                ->orderBy('u.id')
                ->setParameter('utilisateur', $utilisateur);
        
        return $qb->getQuery()->getResult();
    }
    
    public function getAllFacture()
    {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.valider = 1')
                ->andWhere('u.reference != 0')
                ->orderBy('u.id')
        ;
        return $qb->getQuery()->getResult();
    }
    
    public function byDateCommand($date)
    {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.date > :date')
                ->andWhere('u.valider = 1')
                ->orderBy('u.id')
                ->setParameter('date', $date);
        
        return $qb->getQuery()->getResult();
    }
    
    public function getAchatsByIdUser($id) 
    {
        $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.marque = :id')
                ->setParameter('id', $id)
        ;
        return $qb->getQuery()->getResult();
    }
}
