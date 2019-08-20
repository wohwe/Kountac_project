<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achats
 *
 * @ORM\Table(name="sousachats")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\SousAchatsRepository")
 */
class SousAchats
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
     * @var int
     * 
     * @ORM\Column(name="marque_id", type="integer")
     */
    private $marque;

    
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
     * @var int
     * 
     * @ORM\Column(name="statut", type="string")
     */
    private $statut;

    /**
     * @var int
     * 
     * @ORM\Column(name="accepter", type="integer")
     */
    private $accepter;

    /**
     * @var int
     * 
     * @ORM\Column(name="livraison", type="integer")
     */
    private $livraison;

    /**
     * @var int
     * 
     * @ORM\Column(name="expedier", type="integer")
     */
    private $expedier;

    /**
     * @var string
     * 
     * @ORM\Column(name="date_expedition", type="string")
     */
    private $date_expedition;

    /**
     * @var string
     * 
     * @ORM\Column(name="date_reception", type="string")
     */
    private $date_reception;

    /**
     * @var int
     * 
     * @ORM\Column(name="statut_reception", type="integer")
     */
    private $statut_reception;

    /**
     * @var string
     * 
     * @ORM\Column(name="date_livraison", type="string")
     */
    private $date_livraison;


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
     * Set accepter
     *
     * @param array $accepter
     * @return Achats
     */
    public function setAccepter($accepter)
    {
        $this->accepter = $accepter;

        return $this;
    }

    /**
     * Get accepter
     *
     * @return integer 
     */
    public function getAccepter()
    {
        return $this->accepter;
    }

    /**
     * Set livraison
     *
     * @param array $livraison
     * @return Achats
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return integer 
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set expedier
     *
     * @param array $expedier
     * @return Achats
     */
    public function setExpedier($expedier)
    {
        $this->expedier = $expedier;

        return $this;
    }

    /**
     * Get expedier
     *
     * @return integer 
     */
    public function getExpedier()
    {
        return $this->expedier;
    }

    /**
     * Set date_expedition
     *
     * @param array $date_expedition
     * @return Achats
     */
    public function setDate_expedition($date_expedition)
    {
        $this->date_expedition = $date_expedition;

        return $this;
    }

    /**
     * Get date_expedition
     *
     * @return integer 
     */
    public function getDate_expedition()
    {
        return $this->date_expedition;
    }

    /**
     * Set date_reception
     *
     * @param array $date_reception
     * @return Achats
     */
    public function setDate_reception($date_reception)
    {
        $this->date_reception = $date_reception;

        return $this;
    }

    /**
     * Get date_reception
     *
     * @return integer 
     */
    public function getDate_reception()
    {
        return $this->date_reception;
    }

    /**
     * Set statut
     *
     * @param array $statut
     * @return Achats
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set statut_reception
     *
     * @param array $statut_reception
     * @return Achats
     */
    public function setStatut_reception($statut_reception)
    {
        $this->statut_reception = $statut_reception;

        return $this;
    }

    /**
     * Get statut_reception
     *
     * @return integer 
     */
    public function getStatut_reception()
    {
        return $this->statut_reception;
    }

    /**
     * Set date_livraison
     *
     * @param array $date_livraison
     * @return Achats
     */
    public function setDate_livraison($date_livraison)
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    /**
     * Get date_livraison
     *
     * @return string 
     */
    public function getDate_livraison()
    {
        return $this->date_livraison;
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
     * Set marque
     *
     * @param int $marque
     * @return int
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return int
     */
    public function getMarque()
    {
        return $this->marque;
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
    }/**
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
