<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;

/**
 * Produits_1
 *
 * @ORM\Table(name="produits_1")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\Produits_1Repository")
 */
class Produits_1
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
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Collections", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $collection;
    
    /**
     * @ORM\OneToMany(targetEntity="Kountac\KountacBundle\Entity\Produits_2", mappedBy="produit_1", cascade={"persist"})
     */
    private $produit_2;
    
    /**
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $categorie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="produit_1_marque", cascade={"persist"})
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $marque;
  
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=100)
     */
    private $matiere;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="popularite", type="integer", nullable=true)
     */
    private $popularite;
    
    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="date", nullable=true)
     */
    private $dateajout;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateupdate", type="date", nullable=true)
     */
    private $dateupdate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateachat", type="date", nullable=true)
     */
    private $dateachat;
   
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     *
     * @return Produits_1
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

    /**
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Produits_1
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits_1
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    
    /**
     * Set collection
     *
     * @param \Kountac\KountacBundle\Entity\Collections $collection
     *
     * @return Produits_1
     */
    public function setCollection(\Kountac\KountacBundle\Entity\Collections $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \Kountac\KountacBundle\Entity\Collections
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set categorie
     *
     * @param \Kountac\KountacBundle\Entity\Categories $categorie
     *
     * @return Produits_1
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
     * Set marque
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $marque
     *
     * @return Produits_1
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
     * Set popularite
     *
     * @param integer $popularite
     *
     * @return Produits_1
     */
    public function setPopularite($popularite)
    {
        $this->popularite = $popularite;

        return $this;
    }

    /**
     * Get popularite
     *
     * @return integer
     */
    public function getPopularite()
    {
        return $this->popularite;
    }

    /**
     * Add produit2
     *
     * @param \Kountac\KountacBundle\Entity\Produits_2 $produit2
     *
     * @return Produits_1
     */
    public function addProduit2(\Kountac\KountacBundle\Entity\Produits_2 $produit2)
    {
        $this->produit_2[] = $produit2;

        return $this;
    }

    /**
     * Remove produit2
     *
     * @param \Kountac\KountacBundle\Entity\Produits_2 $produit2
     */
    public function removeProduit2(\Kountac\KountacBundle\Entity\Produits_2 $produit2)
    {
        $this->produit_2->removeElement($produit2);
    }

    /**
     * Get produit2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit2()
    {
        return $this->produit_2;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Produits_1
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * Set dateupdate
     *
     * @param \DateTime $dateupdate
     *
     * @return Produits_1
     */
    public function setDateupdate($dateupdate)
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    /**
     * Get dateupdate
     *
     * @return \DateTime
     */
    public function getDateupdate()
    {
        return $this->dateupdate;
    }

    /**
     * Set dateachat
     *
     * @param \DateTime $dateachat
     *
     * @return Produits_1
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

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produits_1
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }
}
