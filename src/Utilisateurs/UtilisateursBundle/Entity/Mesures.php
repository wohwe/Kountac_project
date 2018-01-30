<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesures
 *
 * @ORM\Table(name="mesures")
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\MesuresRepository")
 */
class Mesures
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="mesures")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulaire;
    
    /**
     * @var float
     *
     * @ORM\Column(name="poitrine", type="float")
     */
    private $poitrine;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float")
     */
    private $taille;
    
    /**
     * @var float
     *
     * @ORM\Column(name="bassin", type="float")
     */
    private $bassin;

    /**
     * @var float
     *
     * @ORM\Column(name="epaules", type="float", nullable=true)
     */
    private $epaules;
    
    /**
     * @var float
     *
     * @ORM\Column(name="seins", type="float", nullable=true)
     */
    private $seins;
    
    /**
     * @var float
     *
     * @ORM\Column(name="epauletaille", type="float", nullable=true)
     */
    private $epauletaille;

    /**
     * @var float
     *
     * @ORM\Column(name="longueur", type="float", nullable=true)
     */
    private $longueur;
    
    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", nullable=true)
     */
    private $genre;
    
    /**
     * @var float
     *
     * @ORM\Column(name="taille_dos", type="float", nullable=true)
     */
    private $taille_dos;

    /**
     * @var float
     *
     * @ORM\Column(name="taille_devant", type="float", nullable=true)
     */
    private $taille_devant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_poitrine", type="float", nullable=true)
     */
    private $hauteur_poitrine;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="demi_ecart_poitrine", type="float", nullable=true)
     */
    private $demi_ecart_poitrine;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_petites_hanches", type="float", nullable=true)
     */
    private $tour_petites_hanches;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_grandes_hanches", type="float", nullable=true)
     */
    private $tour_grandes_hanches;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="demi_tour_encolure", type="float", nullable=true)
     */
    private $demi_tour_encolure;
    
    /**
     * @var float
     *
     * @ORM\Column(name="demi_carrure_dos", type="float", nullable=true)
     */
    private $demi_carrure_dos;
    
    /**
     * @var float
     *
     * @ORM\Column(name="demi_carrure_devant", type="float", nullable=true)
     */
    private $demi_carrure_devant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_epaule", type="float", nullable=true)
     */
    private $longueur_epaule;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_emmanchure", type="float", nullable=true)
     */
    private $tour_emmanchure;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_dessous_bras", type="float", nullable=true)
     */
    private $hauteur_dessous_bras;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_bras", type="float", nullable=true)
     */
    private $longueur_bras;
    
    /**
     * @var float
     *
     * @ORM\Column(name="grosseur_bras", type="float", nullable=true)
     */
    private $grosseur_bras;
    

    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_coude", type="float", nullable=true)
     */
    private $hauteur_coude;
    

    /**
     * @var float
     *
     * @ORM\Column(name="tour_poignet", type="float", nullable=true)
     */
    private $tour_poignet;


    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_hanche", type="float", nullable=true)
     */
    private $hauteur_taille_hanche;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_montant", type="float", nullable=true)
     */
    private $hauteur_montant;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="enfourchure", type="float", nullable=true)
     */
    private $enfourchure;
    
        
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_genou", type="float", nullable=true)
     */
    private $hauteur_taille_genou;
    
        
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_terre", type="float", nullable=true)
     */
    private $hauteur_taille_terre;
    
        
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_cote_terre", type="float", nullable=true)
     */
    private $hauteur_taille_cote_terre;
    
    
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
     * Set utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     * @return Mesures
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
     * Set poitrine
     *
     * @param integer $poitrine
     * @return Mesures
     */
    public function setPoitrine($poitrine)
    {
        $this->poitrine = $poitrine;

        return $this;
    }

    /**
     * Get poitrine
     *
     * @return integer 
     */
    public function getPoitrine()
    {
        return $this->poitrine;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     * @return Mesures
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set bassin
     *
     * @param integer $bassin
     * @return Mesures
     */
    public function setBassin($bassin)
    {
        $this->bassin = $bassin;

        return $this;
    }

    /**
     * Get bassin
     *
     * @return integer 
     */
    public function getBassin()
    {
        return $this->bassin;
    }

    /**
     * Set epaules
     *
     * @param integer $epaules
     * @return Mesures
     */
    public function setEpaules($epaules)
    {
        $this->epaules = $epaules;

        return $this;
    }

    /**
     * Get epaules
     *
     * @return integer 
     */
    public function getEpaules()
    {
        return $this->epaules;
    }

    /**
     * Set seins
     *
     * @param integer $seins
     * @return Mesures
     */
    public function setSeins($seins)
    {
        $this->seins = $seins;

        return $this;
    }

    /**
     * Get seins
     *
     * @return integer 
     */
    public function getSeins()
    {
        return $this->seins;
    }

    /**
     * Set epauletaille
     *
     * @param integer $epauletaille
     * @return Mesures
     */
    public function setEpauletaille($epauletaille)
    {
        $this->epauletaille = $epauletaille;

        return $this;
    }

    /**
     * Get epauletaille
     *
     * @return integer 
     */
    public function getEpauletaille()
    {
        return $this->epauletaille;
    }

    /**
     * Set longueur
     *
     * @param integer $longueur
     * @return Mesures
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur
     *
     * @return integer 
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set titulaire
     *
     * @param string $titulaire
     * @return Mesures
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
     * Set genre
     *
     * @param string $genre
     * @return Mesures
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set taille_dos
     *
     * @param float $tailleDos
     * @return Mesures
     */
    public function setTailleDos($tailleDos)
    {
        $this->taille_dos = $tailleDos;

        return $this;
    }

    /**
     * Get taille_dos
     *
     * @return float 
     */
    public function getTailleDos()
    {
        return $this->taille_dos;
    }

    /**
     * Set taille_devant
     *
     * @param float $tailleDevant
     * @return Mesures
     */
    public function setTailleDevant($tailleDevant)
    {
        $this->taille_devant = $tailleDevant;

        return $this;
    }

    /**
     * Get taille_devant
     *
     * @return float 
     */
    public function getTailleDevant()
    {
        return $this->taille_devant;
    }

    /**
     * Set hauteur_poitrine
     *
     * @param float $hauteurPoitrine
     * @return Mesures
     */
    public function setHauteurPoitrine($hauteurPoitrine)
    {
        $this->hauteur_poitrine = $hauteurPoitrine;

        return $this;
    }

    /**
     * Get hauteur_poitrine
     *
     * @return float 
     */
    public function getHauteurPoitrine()
    {
        return $this->hauteur_poitrine;
    }

    /**
     * Set demi_ecart_poitrine
     *
     * @param float $demiEcartPoitrine
     * @return Mesures
     */
    public function setDemiEcartPoitrine($demiEcartPoitrine)
    {
        $this->demi_ecart_poitrine = $demiEcartPoitrine;

        return $this;
    }

    /**
     * Get demi_ecart_poitrine
     *
     * @return float 
     */
    public function getDemiEcartPoitrine()
    {
        return $this->demi_ecart_poitrine;
    }

    /**
     * Set tour_petites_hanches
     *
     * @param float $tourPetitesHanches
     * @return Mesures
     */
    public function setTourPetitesHanches($tourPetitesHanches)
    {
        $this->tour_petites_hanches = $tourPetitesHanches;

        return $this;
    }

    /**
     * Get tour_petites_hanches
     *
     * @return float 
     */
    public function getTourPetitesHanches()
    {
        return $this->tour_petites_hanches;
    }

    /**
     * Set tour_grandes_hanches
     *
     * @param float $tourGrandesHanches
     * @return Mesures
     */
    public function setTourGrandesHanches($tourGrandesHanches)
    {
        $this->tour_grandes_hanches = $tourGrandesHanches;

        return $this;
    }

    /**
     * Get tour_grandes_hanches
     *
     * @return float 
     */
    public function getTourGrandesHanches()
    {
        return $this->tour_grandes_hanches;
    }

    /**
     * Set demi_tour_encolure
     *
     * @param float $demiTourEncolure
     * @return Mesures
     */
    public function setDemiTourEncolure($demiTourEncolure)
    {
        $this->demi_tour_encolure = $demiTourEncolure;

        return $this;
    }

    /**
     * Get demi_tour_encolure
     *
     * @return float 
     */
    public function getDemiTourEncolure()
    {
        return $this->demi_tour_encolure;
    }

    /**
     * Set demi_carrure_dos
     *
     * @param float $demiCarrureDos
     * @return Mesures
     */
    public function setDemiCarrureDos($demiCarrureDos)
    {
        $this->demi_carrure_dos = $demiCarrureDos;

        return $this;
    }

    /**
     * Get demi_carrure_dos
     *
     * @return float 
     */
    public function getDemiCarrureDos()
    {
        return $this->demi_carrure_dos;
    }

    /**
     * Set demi_carrure_devant
     *
     * @param float $demiCarrureDevant
     * @return Mesures
     */
    public function setDemiCarrureDevant($demiCarrureDevant)
    {
        $this->demi_carrure_devant = $demiCarrureDevant;

        return $this;
    }

    /**
     * Get demi_carrure_devant
     *
     * @return float 
     */
    public function getDemiCarrureDevant()
    {
        return $this->demi_carrure_devant;
    }

    /**
     * Set longueur_epaule
     *
     * @param float $longueurEpaule
     * @return Mesures
     */
    public function setLongueurEpaule($longueurEpaule)
    {
        $this->longueur_epaule = $longueurEpaule;

        return $this;
    }

    /**
     * Get longueur_epaule
     *
     * @return float 
     */
    public function getLongueurEpaule()
    {
        return $this->longueur_epaule;
    }

    /**
     * Set tour_emmanchure
     *
     * @param float $tourEmmanchure
     * @return Mesures
     */
    public function setTourEmmanchure($tourEmmanchure)
    {
        $this->tour_emmanchure = $tourEmmanchure;

        return $this;
    }

    /**
     * Get tour_emmanchure
     *
     * @return float 
     */
    public function getTourEmmanchure()
    {
        return $this->tour_emmanchure;
    }

    /**
     * Set hauteur_dessous_bras
     *
     * @param float $hauteurDessousBras
     * @return Mesures
     */
    public function setHauteurDessousBras($hauteurDessousBras)
    {
        $this->hauteur_dessous_bras = $hauteurDessousBras;

        return $this;
    }

    /**
     * Get hauteur_dessous_bras
     *
     * @return float 
     */
    public function getHauteurDessousBras()
    {
        return $this->hauteur_dessous_bras;
    }

    /**
     * Set longueur_bras
     *
     * @param float $longueurBras
     * @return Mesures
     */
    public function setLongueurBras($longueurBras)
    {
        $this->longueur_bras = $longueurBras;

        return $this;
    }

    /**
     * Get longueur_bras
     *
     * @return float 
     */
    public function getLongueurBras()
    {
        return $this->longueur_bras;
    }

    /**
     * Set grosseur_bras
     *
     * @param float $grosseurBras
     * @return Mesures
     */
    public function setGrosseurBras($grosseurBras)
    {
        $this->grosseur_bras = $grosseurBras;

        return $this;
    }

    /**
     * Get grosseur_bras
     *
     * @return float 
     */
    public function getGrosseurBras()
    {
        return $this->grosseur_bras;
    }

    /**
     * Set hauteur_coude
     *
     * @param float $hauteurCoude
     * @return Mesures
     */
    public function setHauteurCoude($hauteurCoude)
    {
        $this->hauteur_coude = $hauteurCoude;

        return $this;
    }

    /**
     * Get hauteur_coude
     *
     * @return float 
     */
    public function getHauteurCoude()
    {
        return $this->hauteur_coude;
    }

    /**
     * Set tour_poignet
     *
     * @param float $tourPoignet
     * @return Mesures
     */
    public function setTourPoignet($tourPoignet)
    {
        $this->tour_poignet = $tourPoignet;

        return $this;
    }

    /**
     * Get tour_poignet
     *
     * @return float 
     */
    public function getTourPoignet()
    {
        return $this->tour_poignet;
    }

    /**
     * Set hauteur_taille_hanche
     *
     * @param float $hauteurTailleHanche
     * @return Mesures
     */
    public function setHauteurTailleHanche($hauteurTailleHanche)
    {
        $this->hauteur_taille_hanche = $hauteurTailleHanche;

        return $this;
    }

    /**
     * Get hauteur_taille_hanche
     *
     * @return float 
     */
    public function getHauteurTailleHanche()
    {
        return $this->hauteur_taille_hanche;
    }

    /**
     * Set hauteur_montant
     *
     * @param float $hauteurMontant
     * @return Mesures
     */
    public function setHauteurMontant($hauteurMontant)
    {
        $this->hauteur_montant = $hauteurMontant;

        return $this;
    }

    /**
     * Get hauteur_montant
     *
     * @return float 
     */
    public function getHauteurMontant()
    {
        return $this->hauteur_montant;
    }

    /**
     * Set enfourchure
     *
     * @param float $enfourchure
     * @return Mesures
     */
    public function setEnfourchure($enfourchure)
    {
        $this->enfourchure = $enfourchure;

        return $this;
    }

    /**
     * Get enfourchure
     *
     * @return float 
     */
    public function getEnfourchure()
    {
        return $this->enfourchure;
    }

    /**
     * Set hauteur_taille_genou
     *
     * @param float $hauteurTailleGenou
     * @return Mesures
     */
    public function setHauteurTailleGenou($hauteurTailleGenou)
    {
        $this->hauteur_taille_genou = $hauteurTailleGenou;

        return $this;
    }

    /**
     * Get hauteur_taille_genou
     *
     * @return float 
     */
    public function getHauteurTailleGenou()
    {
        return $this->hauteur_taille_genou;
    }

    /**
     * Set hauteur_taille_terre
     *
     * @param float $hauteurTailleTerre
     * @return Mesures
     */
    public function setHauteurTailleTerre($hauteurTailleTerre)
    {
        $this->hauteur_taille_terre = $hauteurTailleTerre;

        return $this;
    }

    /**
     * Get hauteur_taille_terre
     *
     * @return float 
     */
    public function getHauteurTailleTerre()
    {
        return $this->hauteur_taille_terre;
    }

    /**
     * Set hauteur_taille_cote_terre
     *
     * @param float $hauteurTailleCoteTerre
     * @return Mesures
     */
    public function setHauteurTailleCoteTerre($hauteurTailleCoteTerre)
    {
        $this->hauteur_taille_cote_terre = $hauteurTailleCoteTerre;

        return $this;
    }

    /**
     * Get hauteur_taille_cote_terre
     *
     * @return float 
     */
    public function getHauteurTailleCoteTerre()
    {
        return $this->hauteur_taille_cote_terre;
    }
}
