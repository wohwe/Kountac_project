<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commandes
 *
 * @ORM\Table(name="commandes")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\CommandesRepository")
 */
class Commandes
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
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Media_motif", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="commande_utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $utilisateur;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="commande_marque", cascade={"persist"})
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $marque;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Produits_2", inversedBy="reservation", cascade={"persist"})
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id", nullable=true)
     */
    private $produit;
    
    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=150)
     */
    private $intitule;
    
    /**
     * @var array
     * 
     * @ORM\Column(name="mesures", type="array", nullable=true)
     */
    private $mesures;
    
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prixCommande", type="float", nullable=true)
     */
    private $prixCommande;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateacceptation", type="date", nullable=true)
     */
    private $dateacceptation;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateachat", type="date", nullable=true)
     */
    private $dateachat;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datelivraison", type="date", nullable=true)
     */
    private $datelivraison;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="acheter", type="boolean", nullable=true)
     */
    private $acheter;
 
    /**
     * @var bool
     *
     * @ORM\Column(name="terminer", type="boolean", nullable=true)
     */
    private $terminer;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="envoyer", type="boolean", nullable=true)
     */
    private $envoyer;

    /**
     * @var bool
     *
     * @ORM\Column(name="livrer", type="boolean", nullable=true)
     */
    private $livrer;
    
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
     * Set contenu
     *
     * @param string $contenu
     * @return Commandes
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commandes
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
     * Set terminer
     *
     * @param boolean $terminer
     * @return Produits
     */
    public function setTerminer($terminer)
    {
        $this->terminer = $terminer;

        return $this;
    }

    /**
     * Get terminer
     *
     * @return boolean 
     */
    public function getTerminer()
    {
        return $this->terminer;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return Commandes
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     * @return Commandes
     */
    public function setUtilisateur(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur = null)
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
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $marque
     * @return Commandes
     */
    public function setMarque(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs 
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set categorie
     *
     * @param \Kountac\KountacBundle\Entity\Categories $categorie
     * @return Commandes
     */
    public function setCategorie(\Kountac\KountacBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Kountac\KountacBundle\Entity\Categories 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }


    /**
     * Set mesures
     *
     * @param array $mesures
     * @return Commandes
     */
    public function setMesures($mesures)
    {
        $this->mesures = $mesures;

        return $this;
    }

    /**
     * Get mesures
     *
     * @return array 
     */
    public function getMesures()
    {
        return $this->mesures;
    }

    /**
     * Set prixCommande
     *
     * @param float $prixCommande
     * @return Commandes
     */
    public function setPrixCommande($prixCommande)
    {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    /**
     * Get prixCommande
     *
     * @return float 
     */
    public function getPrixCommande()
    {
        return $this->prixCommande;
    }

    /**
     * Set dateacceptation
     *
     * @param \DateTime $dateacceptation
     *
     * @return Commandes
     */
    public function setDateacceptation($dateacceptation)
    {
        $this->dateacceptation = $dateacceptation;

        return $this;
    }

    /**
     * Get dateacceptation
     *
     * @return \DateTime
     */
    public function getDateacceptation()
    {
        return $this->dateacceptation;
    }

    /**
     * Set datelivraison
     *
     * @param \DateTime $datelivraison
     *
     * @return Commandes
     */
    public function setDatelivraison($datelivraison)
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    /**
     * Get datelivraison
     *
     * @return \DateTime
     */
    public function getDatelivraison()
    {
        return $this->datelivraison;
    }

    /**
     * Set livrer
     *
     * @param boolean $livrer
     *
     * @return Commandes
     */
    public function setLivrer($livrer)
    {
        $this->livrer = $livrer;

        return $this;
    }

    /**
     * Get livrer
     *
     * @return boolean
     */
    public function getLivrer()
    {
        return $this->livrer;
    }

    /**
     * Set envoyer
     *
     * @param boolean $envoyer
     *
     * @return Commandes
     */
    public function setEnvoyer($envoyer)
    {
        $this->envoyer = $envoyer;

        return $this;
    }

    /**
     * Get envoyer
     *
     * @return boolean
     */
    public function getEnvoyer()
    {
        return $this->envoyer;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set produit
     *
     * @param \Kountac\KountacBundle\Entity\Produits_2 $produit
     *
     * @return Commandes
     */
    public function setProduit(\Kountac\KountacBundle\Entity\Produits_2 $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Kountac\KountacBundle\Entity\Produits_2
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set image
     *
     * @param \Kountac\KountacBundle\Entity\Media_motif $image
     *
     * @return Commandes
     */
    public function setImage(\Kountac\KountacBundle\Entity\Media_motif $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Kountac\KountacBundle\Entity\Media_motif
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set acheter
     *
     * @param boolean $acheter
     *
     * @return Commandes
     */
    public function setAcheter($acheter)
    {
        $this->acheter = $acheter;

        return $this;
    }

    /**
     * Get acheter
     *
     * @return boolean
     */
    public function getAcheter()
    {
        return $this->acheter;
    }

    /**
     * Set dateachat
     *
     * @param \DateTime $dateachat
     *
     * @return Commandes
     */
    public function setDateachat($dateachat)
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    /**
     * Get dateachat
     *
     * @return \DateTime
     */
    public function getDateachat()
    {
        return $this->dateachat;
    }
}
