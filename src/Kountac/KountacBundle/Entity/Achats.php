<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achats
 *
 * @ORM\Table(name="achats")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\AchatsRepository")
 */
class Achats
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="achats")
     * @ORM\JoinColumn(nullable=true)
     */    
    private $utilisateur;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="valider", type="boolean")
     */
    private $valider;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="effacer", type="boolean", nullable=true)
     */
    private $effacer;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="euro", type="boolean", nullable=true)
     */
    private $euro;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="all_a", type="boolean", nullable=true)
     */
    private $all;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="livre", type="boolean", nullable=true)
     */
    private $livre;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="usa", type="boolean", nullable=true)
     */
    private $usa;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="cfa", type="boolean", nullable=true)
     */
    private $cfa;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="naira", type="boolean", nullable=true)
     */
    private $naira;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date_a", type="date")
     */
    private $date;

    /**
     * @var int
     * 
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;

    /**
     * @var array
     * 
     * @ORM\Column(name="achat", type="array")
     */
    private $achat;


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
     * Set valider
     *
     * @param boolean $valider
     * @return Achats
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return boolean 
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Achats
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set reference
     *
     * @param integer $reference
     * @return Achats
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set achat
     *
     * @param array $achat
     * @return Achats
     */
    public function setAchat($achat)
    {
        $this->achat = $achat;

        return $this;
    }

    /**
     * Get achat
     *
     * @return array 
     */
    public function getAchat()
    {
        return $this->achat;
    }

    /**
     * Set utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     * @return Achats
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }


    /**
     * Set effacer
     *
     * @param boolean $effacer
     *
     * @return Achats
     */
    public function setEffacer($effacer)
    {
        $this->effacer = $effacer;

        return $this;
    }

    /**
     * Get effacer
     *
     * @return boolean
     */
    public function getEffacer()
    {
        return $this->effacer;
    }

    /**
     * Set cfa
     *
     * @param boolean $cfa
     *
     * @return Achats
     */
    public function setCfa($cfa)
    {
        $this->cfa = $cfa;

        return $this;
    }

    /**
     * Get cfa
     *
     * @return boolean
     */
    public function getCfa()
    {
        return $this->cfa;
    }

    /**
     * Set euro
     *
     * @param boolean $euro
     *
     * @return Achats
     */
    public function setEuro($euro)
    {
        $this->euro = $euro;

        return $this;
    }

    /**
     * Get euro
     *
     * @return boolean
     */
    public function getEuro()
    {
        return $this->euro;
    }

    /**
     * Set livre
     *
     * @param boolean $livre
     *
     * @return Achats
     */
    public function setLivre($livre)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return boolean
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set usa
     *
     * @param boolean $usa
     *
     * @return Achats
     */
    public function setUsa($usa)
    {
        $this->usa = $usa;

        return $this;
    }

    /**
     * Get usa
     *
     * @return boolean
     */
    public function getUsa()
    {
        return $this->usa;
    }

    /**
     * Set naira
     *
     * @param boolean $naira
     *
     * @return Achats
     */
    public function setNaira($naira)
    {
        $this->naira = $naira;

        return $this;
    }

    /**
     * Get naira
     *
     * @return boolean
     */
    public function getNaira()
    {
        return $this->naira;
    }

    /**
     * Set all
     *
     * @param boolean $all
     *
     * @return Achats
     */
    public function setAll($all)
    {
        $this->all = $all;

        return $this;
    }

    /**
     * Get all
     *
     * @return boolean
     */
    public function getAll()
    {
        return $this->all;
    }
}
