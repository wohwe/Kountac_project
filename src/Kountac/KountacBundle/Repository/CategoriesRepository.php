<?php

namespace Kountac\KountacBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TousCategoriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoriesRepository extends EntityRepository
{
    public function getCategoriesByName() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->where('c.parent is Null')
                ->orderBy('c.nom', 'DESC')
                ;       
        return $qb->getQuery()->getResult();
    }
    
    public function getFemmesHautsChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :hauts')
                ->andWhere('pp.nom = :femmes')
                ->setParameter('hauts', "Hauts")
                ->setParameter('femmes', "Femmes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getFemmesBasChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :bas')
                ->andWhere('pp.nom = :femmes')
                ->setParameter('bas', "Bas")
                ->setParameter('femmes', "Femmes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getFemmesEnsemblesChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :ensembles')
                ->andWhere('pp.nom = :femmes')
                ->setParameter('ensembles', "Ensembles")
                ->setParameter('femmes', "Femmes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getHommesHautsChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :hauts')
                ->andWhere('pp.nom = :hommes')
                ->setParameter('hauts', "Hauts")
                ->setParameter('hommes', "Hommes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getHommesBasChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :bas')
                ->andWhere('pp.nom = :hommes')
                ->setParameter('bas', "Bas")
                ->setParameter('hommes', "Hommes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getHommesEnsemblesChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :ensembles')
                ->andWhere('pp.nom = :hommes')
                ->setParameter('ensembles', "Ensembles")
                ->setParameter('hommes', "Hommes")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getEnfantsHautsChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :hauts')
                ->andWhere('pp.nom = :enfants')
                ->setParameter('hauts', "Hauts")
                ->setParameter('enfants', "Enfants")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getEnfantsBasChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :bas')
                ->andWhere('pp.nom = :enfants')
                ->setParameter('bas', "Bas")
                ->setParameter('enfants', "Enfants")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    public function getEnfantsEnsemblesChildren() 
    {
        $qb = $this->createQueryBuilder('c')
                ->select('c')
                ->leftJoin('c.parent', 'p')
                ->addSelect('p')
                ->leftJoin('p.parent', 'pp')
                ->addSelect('pp')
                ->where('p.nom = :ensembles')
                ->andWhere('pp.nom = :enfants')
                ->setParameter('ensembles', "Ensembles")
                ->setParameter('enfants', "Enfants")
                ->orderBy('c.nom', 'ASC');
        return $qb->getQuery()->getResult();
    }
}