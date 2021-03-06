<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicePaiement
 * 
 * @ORM\Table(name="servicepaiement")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\ServicePaiementRepository")
 */
class ServicePaiement
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="titulaire", type="string", length=255, nullable=true)
     */
    private $titulaire;
        
    /**
     * @var float
     *
     * @ORM\Column(name="numero", type="float", nullable=true)
     */
    private $numero;
    
    /**
     * @var float
     *
     * @ORM\Column(name="moisexp", type="float", nullable=true)
     */
    private $moisexp;
    
    /**
     * @var float
     *
     * @ORM\Column(name="anneeexp", type="float", nullable=true)
     */
    private $anneeexp;
    
    /**
     * @var int
     *
     * @ORM\Column(name="numero_verification", type="integer", nullable=true)
     */
    private $numeroverification;
    
    
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
     * @return ServicePaiement
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

    /**
     * Set paiement
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $paiement
     * @return ServicePaiement
     */
    public function setPaiement(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $paiement = null)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs 
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set titulaire
     *
     * @param string $titulaire
     * @return ServicePaiement
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get titulaire
     *
     * @return string 
     */
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return ServicePaiement
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

 
    /**
     * Set numeroverification
     *
     * @param integer $numeroverification
     * @return ServicePaiement
     */
    public function setNumeroverification($numeroverification)
    {
        $this->numeroverification = $numeroverification;

        return $this;
    }

    /**
     * Get numeroverification
     *
     * @return integer 
     */
    public function getNumeroverification()
    {
        return $this->numeroverification;
    }

    /**
     * Set moisexp
     *
     * @param float $moisexp
     *
     * @return ServicePaiement
     */
    public function setMoisexp($moisexp)
    {
        $this->moisexp = $moisexp;

        return $this;
    }

    /**
     * Get moisexp
     *
     * @return float
     */
    public function getMoisexp()
    {
        return $this->moisexp;
    }

    /**
     * Set anneeexp
     *
     * @param float $anneeexp
     *
     * @return ServicePaiement
     */
    public function setAnneeexp($anneeexp)
    {
        $this->anneeexp = $anneeexp;

        return $this;
    }

    /**
     * Get anneeexp
     *
     * @return float
     */
    public function getAnneeexp()
    {
        return $this->anneeexp;
    }
}
