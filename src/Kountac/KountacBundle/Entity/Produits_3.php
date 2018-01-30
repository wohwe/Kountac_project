<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits_3")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\Produits_3Repository")
 */
class Produits_3
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
     * @ORM\ManyToOne(targetEntity="Kountac\KountacBundle\Entity\Produits_2", inversedBy="produit_3", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $produit_2;
    
    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=100)
     */
    private $taille;
    
    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;


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
     * Set taille
     *
     * @param string $taille
     *
     * @return Produits_3
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produits_3
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
     * Set produit2
     *
     * @param \Kountac\KountacBundle\Entity\Produits_2 $produit2
     *
     * @return Produits_3
     */
    public function setProduit2(\Kountac\KountacBundle\Entity\Produits_2 $produit2 = null)
    {
        $this->produit_2 = $produit2;

        return $this;
    }

    /**
     * Get produit2
     *
     * @return \Kountac\KountacBundle\Entity\Produits_2
     */
    public function getProduit2()
    {
        return $this->produit_2;
    }
}
