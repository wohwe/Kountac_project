<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libelles_motif
 *
 * @ORM\Table(name="mannequin")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\MannequinRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Mannequin
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
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="mannequin", cascade={"persist"})
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $marque;
    
    /**
     * @ORM\OneToMany(targetEntity="Kountac\KountacBundle\Entity\Media_motif", mappedBy="mannequin", cascade={"persist"})
     */
    private $picture;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    public $file;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="date", nullable=true)
     */
    private $date_ajout;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="date", nullable=true)
     */
    private $date_update;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_mannequin", type="string", nullable=true, length=100)
     */
    private $nom_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="taille_standard_mannequin", type="string", nullable=true, length=100)
     */
    private $taille_standard_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="poids_mannequin", type="float", nullable=true)
     */
    private $poids_mannequin;
    
     /**
     * @var string
     *
     * @ORM\Column(name="taille_mannequin", type="float", nullable=true)
     */
    private $taille_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="numero_teint_mannequin", type="float", nullable=true)
     */
    private $numero_teint_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tour_taille_mannequin", type="float", nullable=true)
     */
    private $tour_taille_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tour_poitrine_mannequin", type="float", nullable=true)
     */
    private $tour_poitrine_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tour_grandes_hanches_mannequin", type="float", nullable=true)
     */
    private $tour_grandes_hanches_mannequin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="statut_mannequin", type="string", nullable=true, length=100)
     */
    private $statut_mannequin;
    
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/Mannequins';
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    
    public function getAssetPath()
    {
        return 'Mannequins/'.$this->path;
    }
    
    /**
     * @ORM\Prepersist()
     * @ORM\Preupdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->modifieLe = new \DateTime();
       
        if (null !== $this->file){
            $this->path = sha1(uniqid (mt_rand (),TRUE)).'.'.$this->file->guessExtension();
        }       
    }

    
    /**
     * @ORM\Postpersist()
     * @ORM\Postupdate()
     */
    public function upload()
    {
         if (null !== $this->file) 
         {
             $this->file->move($this->getUploadRootDir(),$this->path);
             unset($this->file);
             
             if ($this->oldFile != null){
                 unlink ($this->tempFile);
             }
         }
    }
    
    
    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();        
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
     * Set tailleStandardMannequin
     *
     * @param string $tailleStandardMannequin
     *
     * @return Mannequin
     */
    public function setTailleStandardMannequin($tailleStandardMannequin)
    {
        $this->taille_standard_mannequin = $tailleStandardMannequin;

        return $this;
    }

    /**
     * Get tailleStandardMannequin
     *
     * @return string
     */
    public function getTailleStandardMannequin()
    {
        return $this->taille_standard_mannequin;
    }

    /**
     * Set poidsMannequin
     *
     * @param float $poidsMannequin
     *
     * @return Mannequin
     */
    public function setPoidsMannequin($poidsMannequin)
    {
        $this->poids_mannequin = $poidsMannequin;

        return $this;
    }

    /**
     * Get poidsMannequin
     *
     * @return float
     */
    public function getPoidsMannequin()
    {
        return $this->poids_mannequin;
    }


    /**
     * Set path
     *
     * @param string $path
     *
     * @return Mannequin
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set nomMannequin
     *
     * @param string $nomMannequin
     *
     * @return Mannequin
     */
    public function setNomMannequin($nomMannequin)
    {
        $this->nom_mannequin = $nomMannequin;

        return $this;
    }

    /**
     * Get nomMannequin
     *
     * @return string
     */
    public function getNomMannequin()
    {
        return $this->nom_mannequin;
    }

    /**
     * Set tailleMannequin
     *
     * @param float $tailleMannequin
     *
     * @return Mannequin
     */
    public function setTailleMannequin($tailleMannequin)
    {
        $this->taille_mannequin = $tailleMannequin;

        return $this;
    }

    /**
     * Get tailleMannequin
     *
     * @return float
     */
    public function getTailleMannequin()
    {
        return $this->taille_mannequin;
    }

    /**
     * Set numeroTeintMannequin
     *
     * @param float $numeroTeintMannequin
     *
     * @return Mannequin
     */
    public function setNumeroTeintMannequin($numeroTeintMannequin)
    {
        $this->numero_teint_mannequin = $numeroTeintMannequin;

        return $this;
    }

    /**
     * Get numeroTeintMannequin
     *
     * @return float
     */
    public function getNumeroTeintMannequin()
    {
        return $this->numero_teint_mannequin;
    }

    /**
     * Set tourTailleMannequin
     *
     * @param float $tourTailleMannequin
     *
     * @return Mannequin
     */
    public function setTourTailleMannequin($tourTailleMannequin)
    {
        $this->tour_taille_mannequin = $tourTailleMannequin;

        return $this;
    }

    /**
     * Get tourTailleMannequin
     *
     * @return float
     */
    public function getTourTailleMannequin()
    {
        return $this->tour_taille_mannequin;
    }

    /**
     * Set tourPoitrineMannequin
     *
     * @param float $tourPoitrineMannequin
     *
     * @return Mannequin
     */
    public function setTourPoitrineMannequin($tourPoitrineMannequin)
    {
        $this->tour_poitrine_mannequin = $tourPoitrineMannequin;

        return $this;
    }

    /**
     * Get tourPoitrineMannequin
     *
     * @return float
     */
    public function getTourPoitrineMannequin()
    {
        return $this->tour_poitrine_mannequin;
    }

    /**
     * Set tourGrandesHanchesMannequin
     *
     * @param float $tourGrandesHanchesMannequin
     *
     * @return Mannequin
     */
    public function setTourGrandesHanchesMannequin($tourGrandesHanchesMannequin)
    {
        $this->tour_grandes_hanches_mannequin = $tourGrandesHanchesMannequin;

        return $this;
    }

    /**
     * Get tourGrandesHanchesMannequin
     *
     * @return float
     */
    public function getTourGrandesHanchesMannequin()
    {
        return $this->tour_grandes_hanches_mannequin;
    }

    /**
     * Set statutMannequin
     *
     * @param string $statutMannequin
     *
     * @return Mannequin
     */
    public function setStatutMannequin($statutMannequin)
    {
        $this->statut_mannequin = $statutMannequin;

        return $this;
    }

    /**
     * Get statutMannequin
     *
     * @return string
     */
    public function getStatutMannequin()
    {
        return $this->statut_mannequin;
    }

    /**
     * Set marque
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $marque
     *
     * @return Mannequin
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
    
    public function __toString()
    {
        return $this->getNomMannequin();
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Mannequin
     */
    public function setDateAjout($dateAjout)
    {
        $this->date_ajout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->date_ajout;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return Mannequin
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->date_update = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Add picture
     *
     * @param \Kountac\KountacBundle\Entity\Media_motif $picture
     *
     * @return Mannequin
     */
    public function addPicture(\Kountac\KountacBundle\Entity\Media_motif $picture)
    {
        $this->picture[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \Kountac\KountacBundle\Entity\Media_motif $picture
     */
    public function removePicture(\Kountac\KountacBundle\Entity\Media_motif $picture)
    {
        $this->picture->removeElement($picture);
    }

    /**
     * Get picture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set produit2
     *
     * @param \Kountac\KountacBundle\Entity\Mannequin $produit2
     *
     * @return Mannequin
     */
    public function setProduit2(\Kountac\KountacBundle\Entity\Mannequin $produit2 = null)
    {
        $this->produit_2 = $produit2;

        return $this;
    }

    /**
     * Get produit2
     *
     * @return \Kountac\KountacBundle\Entity\Mannequin
     */
    public function getProduit2()
    {
        return $this->produit_2;
    }
}
