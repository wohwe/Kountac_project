<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceLivraison
 * 
 * @ORM\Table(name="servicelivraison")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\ServiceLivraisonRepository")
 */
  
class ServiceLivraison
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=true)
     */
    private $nom;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return ServiceLivraison
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    
    public function __toString()
    {
        return $this->getNom();
    }

}
