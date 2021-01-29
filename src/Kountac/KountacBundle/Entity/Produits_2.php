<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits_2")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\Produits_2Repository")
 */
class Produits_2
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
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Produits_1", inversedBy="produit_2", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $produit_1;
    
    /**
     * @ORM\OneToMany(targetEntity="Kountac\KountacBundle\Entity\Produits_3", mappedBy="produit_2", cascade={"persist"})
     */
    private $produit_3;
    
    /**
     * @ORM\OneToMany(targetEntity="Kountac\CommentairesBundle\Entity\Commentaires", mappedBy="produit", cascade={"persist"})
     */
    private $commentaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Libelles_motif", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $libelle;
    
    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    
    /**
     * @var float
     *
     * @ORM\Column(name="reduction", type="float")
     */
    private $reduction;

        /**
     * @var float
     *
     * @ORM\Column(name="allprix", type="float", nullable=true)
     */
    private $allprix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="allprixCommande", type="float", nullable=true)
     */
    private $allprixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="allprecommande", type="boolean", nullable=true)
     */
    private $allprecommande;
    
    /**
     * @var float
     *
     * @ORM\Column(name="europrix", type="float", nullable=true)
     */
    private $europrix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="europrixCommande", type="float", nullable=true)
     */
    private $europrixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="europrecommande", type="boolean", nullable=true)
     */
    private $europrecommande;
    
    /**
     * @var float
     *
     * @ORM\Column(name="cfaprix", type="float", nullable=true)
     */
    private $cfaprix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="cfaprixCommande", type="float", nullable=true)
     */
    private $cfaprixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="cfaprecommande", type="boolean", nullable=true)
     */
    private $cfaprecommande;
    
    /**
     * @var float
     *
     * @ORM\Column(name="usaprix", type="float", nullable=true)
     */
    private $usaprix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="usaprixCommande", type="float", nullable=true)
     */
    private $usaprixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="usaprecommande", type="boolean", nullable=true)
     */
    private $usaprecommande;
    
    /**
     * @var float
     *
     * @ORM\Column(name="livreprix", type="float", nullable=true)
     */
    private $livreprix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="livreprixCommande", type="float", nullable=true)
     */
    private $livreprixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="livreprecommande", type="boolean", nullable=true)
     */
    private $livreprecommande;
    
    /**
     * @var float
     *
     * @ORM\Column(name="nairaprix", type="float", nullable=true)
     */
    private $nairaprix;
    
    /**
     * @var float
     *
     * @ORM\Column(name="nairaprixCommande", type="float", nullable=true)
     */
    private $nairaprixCommande;
    
    /**
     * @var bool
     * 
     * @ORM\Column(name="nairaprecommande", type="boolean", nullable=true)
     */
    private $nairaprecommande;
    
    
    /**
     * @var string
     * 
     * @ORM\Column(name="randValue", type="string", nullable=true)
     */
    private $randValue;
    
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Produits_2
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produit_3 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit3
     *
     * @param \Kountac\KountacBundle\Entity\Produits_3 $produit3
     *
     * @return Produits_2
     */
    public function addProduit3(\Kountac\KountacBundle\Entity\Produits_3 $produit3)
    {
        $this->produit_3[] = $produit3;

        return $this;
    }

    /**
     * Remove produit3
     *
     * @param \Kountac\KountacBundle\Entity\Produits_3 $produit3
     */
    public function removeProduit3(\Kountac\KountacBundle\Entity\Produits_3 $produit3)
    {
        $this->produit_3->removeElement($produit3);
    }

    /**
     * Get produit3
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit3()
    {
        return $this->produit_3;
    }

    /**
     * Set reduction
     *
     * @param float $reduction
     *
     * @return Produits_2
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return float
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * Set libelle
     *
     * @param \Kountac\KountacBundle\Entity\Libelles_motif $libelle
     *
     * @return Produits_2
     */
    public function setLibelle(\Kountac\KountacBundle\Entity\Libelles_motif $libelle = null)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return \Kountac\KountacBundle\Entity\Libelles_motif
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    
    

    /**
     * Set produit1
     *
     * @param \Kountac\KountacBundle\Entity\Produits_1 $produit1
     *
     * @return Produits_2
     */
    public function setProduit1(\Kountac\KountacBundle\Entity\Produits_1 $produit1 = null)
    {
        $this->produit_1 = $produit1;

        return $this;
    }

    /**
     * Get produit1
     *
     * @return \Kountac\KountacBundle\Entity\Produits_1
     */
    public function getProduit1()
    {
        return $this->produit_1;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produits_2
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

    /**
     * Add commentaire
     *
     * @param \Kountac\CommentairesBundle\Entity\Commentaires $commentaire
     *
     * @return Produits_2
     */
    public function addCommentaire(\Kountac\CommentairesBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \Kountac\CommentairesBundle\Entity\Commentaires $commentaire
     */
    public function removeCommentaire(\Kountac\CommentairesBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    
    public function __toString()
    {
        return $this->getProduit1()->getNom().' - '.$this->getLibelle()->getLibelle();
    }

    /**
     * Set allprix
     *
     * @param float $allprix
     *
     * @return Produits_2
     */
    public function setAllprix($allprix)
    {
        $this->allprix = $allprix;

        return $this;
    }

    /**
     * Get allprix
     *
     * @return float
     */
    public function getAllprix()
    {
        return $this->allprix;
    }

    /**
     * Set allprixCommande
     *
     * @param float $allprixCommande
     *
     * @return Produits_2
     */
    public function setAllprixCommande($allprixCommande)
    {
        $this->allprixCommande = $allprixCommande;

        return $this;
    }

    /**
     * Get allprixCommande
     *
     * @return float
     */
    public function getAllprixCommande()
    {
        return $this->allprixCommande;
    }

    /**
     * Set europrix
     *
     * @param float $europrix
     *
     * @return Produits_2
     */
    public function setEuroprix($europrix)
    {
        $this->europrix = $europrix;

        return $this;
    }

    /**
     * Get europrix
     *
     * @return float
     */
    public function getEuroprix()
    {
        return $this->europrix;
    }

    /**
     * Set europrixCommande
     *
     * @param float $europrixCommande
     *
     * @return Produits_2
     */
    public function setEuroprixCommande($europrixCommande)
    {
        $this->europrixCommande = $europrixCommande;

        return $this;
    }

    /**
     * Get europrixCommande
     *
     * @return float
     */
    public function getEuroprixCommande()
    {
        return $this->europrixCommande;
    }

    /**
     * Set cfaprix
     *
     * @param float $cfaprix
     *
     * @return Produits_2
     */
    public function setCfaprix($cfaprix)
    {
        $this->cfaprix = $cfaprix;

        return $this;
    }

    /**
     * Get cfaprix
     *
     * @return float
     */
    public function getCfaprix()
    {
        return $this->cfaprix;
    }

    /**
     * Set cfaprixCommande
     *
     * @param float $cfaprixCommande
     *
     * @return Produits_2
     */
    public function setCfaprixCommande($cfaprixCommande)
    {
        $this->cfaprixCommande = $cfaprixCommande;

        return $this;
    }

    /**
     * Get cfaprixCommande
     *
     * @return float
     */
    public function getCfaprixCommande()
    {
        return $this->cfaprixCommande;
    }

    /**
     * Set usaprix
     *
     * @param float $usaprix
     *
     * @return Produits_2
     */
    public function setUsaprix($usaprix)
    {
        $this->usaprix = $usaprix;

        return $this;
    }

    /**
     * Get usaprix
     *
     * @return float
     */
    public function getUsaprix()
    {
        return $this->usaprix;
    }

    /**
     * Set usaprixCommande
     *
     * @param float $usaprixCommande
     *
     * @return Produits_2
     */
    public function setUsaprixCommande($usaprixCommande)
    {
        $this->usaprixCommande = $usaprixCommande;

        return $this;
    }

    /**
     * Get usaprixCommande
     *
     * @return float
     */
    public function getUsaprixCommande()
    {
        return $this->usaprixCommande;
    }

    /**
     * Set livreprix
     *
     * @param float $livreprix
     *
     * @return Produits_2
     */
    public function setLivreprix($livreprix)
    {
        $this->livreprix = $livreprix;

        return $this;
    }

    /**
     * Get livreprix
     *
     * @return float
     */
    public function getLivreprix()
    {
        return $this->livreprix;
    }

    /**
     * Set livreprixCommande
     *
     * @param float $livreprixCommande
     *
     * @return Produits_2
     */
    public function setLivreprixCommande($livreprixCommande)
    {
        $this->livreprixCommande = $livreprixCommande;

        return $this;
    }

    /**
     * Get livreprixCommande
     *
     * @return float
     */
    public function getLivreprixCommande()
    {
        return $this->livreprixCommande;
    }

    /**
     * Set nairaprix
     *
     * @param float $nairaprix
     *
     * @return Produits_2
     */
    public function setNairaprix($nairaprix)
    {
        $this->nairaprix = $nairaprix;

        return $this;
    }

    /**
     * Get nairaprix
     *
     * @return float
     */
    public function getNairaprix()
    {
        return $this->nairaprix;
    }

    /**
     * Set nairaprixCommande
     *
     * @param float $nairaprixCommande
     *
     * @return Produits_2
     */
    public function setNairaprixCommande($nairaprixCommande)
    {
        $this->nairaprixCommande = $nairaprixCommande;

        return $this;
    }

    /**
     * Get nairaprixCommande
     *
     * @return float
     */
    public function getNairaprixCommande()
    {
        return $this->nairaprixCommande;
    }

    /**
     * Set allprecommande
     *
     * @param boolean $allprecommande
     *
     * @return Produits_2
     */
    public function setAllprecommande($allprecommande)
    {
        $this->allprecommande = $allprecommande;

        return $this;
    }

    /**
     * Get allprecommande
     *
     * @return boolean
     */
    public function getAllprecommande()
    {
        return $this->allprecommande;
    }

    /**
     * Set europrecommande
     *
     * @param boolean $europrecommande
     *
     * @return Produits_2
     */
    public function setEuroprecommande($europrecommande)
    {
        $this->europrecommande = $europrecommande;

        return $this;
    }

    /**
     * Get europrecommande
     *
     * @return boolean
     */
    public function getEuroprecommande()
    {
        return $this->europrecommande;
    }

    /**
     * Set cfaprecommande
     *
     * @param boolean $cfaprecommande
     *
     * @return Produits_2
     */
    public function setCfaprecommande($cfaprecommande)
    {
        $this->cfaprecommande = $cfaprecommande;

        return $this;
    }

    /**
     * Get cfaprecommande
     *
     * @return boolean
     */
    public function getCfaprecommande()
    {
        return $this->cfaprecommande;
    }

    /**
     * Set usaprecommande
     *
     * @param boolean $usaprecommande
     *
     * @return Produits_2
     */
    public function setUsaprecommande($usaprecommande)
    {
        $this->usaprecommande = $usaprecommande;

        return $this;
    }

    /**
     * Get usaprecommande
     *
     * @return boolean
     */
    public function getUsaprecommande()
    {
        return $this->usaprecommande;
    }

    /**
     * Set livreprecommande
     *
     * @param boolean $livreprecommande
     *
     * @return Produits_2
     */
    public function setLivreprecommande($livreprecommande)
    {
        $this->livreprecommande = $livreprecommande;

        return $this;
    }

    /**
     * Get livreprecommande
     *
     * @return boolean
     */
    public function getLivreprecommande()
    {
        return $this->livreprecommande;
    }

    /**
     * Set nairaprecommande
     *
     * @param boolean $nairaprecommande
     *
     * @return Produits_2
     */
    public function setNairaprecommande($nairaprecommande)
    {
        $this->nairaprecommande = $nairaprecommande;

        return $this;
    }

    /**
     * Get nairaprecommande
     *
     * @return boolean
     */
    public function getNairaprecommande()
    {
        return $this->nairaprecommande;
    }

    /**
     * Set randValue
     *
     * @param string $randValue
     *
     * @return Produits_2
     */
    public function setRandValue($randValue)
    {
        $this->randValue = $randValue;

        return $this;
    }

    /**
     * Get randValue
     *
     * @return string
     */
    public function getRandValue()
    {
        return $this->randValue;
    }
}
