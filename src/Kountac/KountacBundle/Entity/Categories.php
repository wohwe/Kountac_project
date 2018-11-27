<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\CategoriesRepository")
 */
class Categories
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
     * @var categories
     * 
     * @ORM\OneToMany(targetEntity="categories", mappedBy="parent", cascade={"persist"}) 
     */
    private $children;
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\ManyToOne(targetEntity="categories", inversedBy="children") 
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
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
     * @return Categories
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
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    
    /**
     * Add children
     *
     * @param \Kountac\KountacBundle\Entity\Categories $children
     * @return Categories
     */
    public function addChild(\Kountac\KountacBundle\Entity\Categories $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Kountac\KountacBundle\Entity\Categories $children
     */
    public function removeChild(\Kountac\KountacBundle\Entity\Categories $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Kountac\KountacBundle\Entity\Categories $parent
     * @return Categories
     */
    public function setParent(\Kountac\KountacBundle\Entity\Categories $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Kountac\KountacBundle\Entity\Categories 
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    public function __toString()
    {
        return $this->getParent().' ->>'.$this->getNom();
    }

}
