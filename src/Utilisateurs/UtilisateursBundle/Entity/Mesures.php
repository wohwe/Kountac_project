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
     * @ORM\Column(name="poitrine", type="float", nullable=true)
     */
    private $poitrine;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float", nullable=true)
     */
    private $taille;
    
    /**
     * @var float
     *
     * @ORM\Column(name="bassin", type="float", nullable=true)
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
     * @var float
     *
     * @ORM\Column(name="tour_poitrine_homme", type="float", nullable=true)
     */
    private $tour_poitrine_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_ceinture_homme", type="float", nullable=true)
     */
    private $tour_ceinture_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_bassin_homme", type="float", nullable=true)
     */
    private $tour_bassin_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_taille_dos_homme", type="float", nullable=true)
     */
    private $longueur_taille_dos_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_taille_devant_homme", type="float", nullable=true)
     */
    private $longueur_taille_devant_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_taille_devant7_homme", type="float", nullable=true)
     */
    private $longueur_taille_devant7_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_encolure_homme", type="float", nullable=true)
     */
    private $tour_encolure_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_tete_homme", type="float", nullable=true)
     */
    private $tour_tete_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_tete_homme", type="float", nullable=true)
     */
    private $hauteur_tete_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="carrure_dos_homme", type="float", nullable=true)
     */
    private $carrure_dos_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="carrure_devant_homme", type="float", nullable=true)
     */
    private $carrure_devant_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_epaule_homme", type="float", nullable=true)
     */
    private $longueur_epaule_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_bras_homme", type="float", nullable=true)
     */
    private $longueur_bras_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_poignet_homme", type="float", nullable=true)
     */
    private $tour_poignet_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_corps_homme", type="float", nullable=true)
     */
    private $hauteur_corps_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_terre_homme", type="float", nullable=true)
     */
    private $hauteur_taille_terre_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_bassin_homme", type="float", nullable=true)
     */
    private $hauteur_taille_bassin_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_montant_homme", type="float", nullable=true)
     */
    private $hauteur_montant_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="enfourchure_homme", type="float", nullable=true)
     */
    private $enfourchure_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_genou_homme", type="float", nullable=true)
     */
    private $hauteur_taille_genou_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_entrejambe_homme", type="float", nullable=true)
     */
    private $longueur_entrejambe_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_cuisse_homme", type="float", nullable=true)
     */
    private $tour_cuisse_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_mollet_homme", type="float", nullable=true)
     */
    private $tour_mollet_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_jarret_homme", type="float", nullable=true)
     */
    private $tour_jarret_homme;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_taille_dos_enfant", type="float", nullable=true)
     */
    private $longueur_taille_dos_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_taille_devant_enfant", type="float", nullable=true)
     */
    private $longueur_taille_devant_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_poitrine_enfant", type="float", nullable=true)
     */
    private $tour_poitrine_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_taille_enfant", type="float", nullable=true)
     */
    private $tour_taille_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_hanches_enfant", type="float", nullable=true)
     */
    private $tour_hanches_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_encolure_enfant", type="float", nullable=true)
     */
    private $tour_encolure_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_epaule_enfant", type="float", nullable=true)
     */
    private $longueur_epaule_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="carrure_dos_enfant", type="float", nullable=true)
     */
    private $carrure_dos_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="carrure_devant_enfant", type="float", nullable=true)
     */
    private $carrure_devant_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_bras_enfant", type="float", nullable=true)
     */
    private $longueur_bras_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="grosseur_bras_enfant", type="float", nullable=true)
     */
    private $grosseur_bras_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longueur_coude_enfant", type="float", nullable=true)
     */
    private $longueur_coude_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_poignet_enfant", type="float", nullable=true)
     */
    private $tour_poignet_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_hanches_enfant", type="float", nullable=true)
     */
    private $hauteur_taille_hanches_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_montant_enfant", type="float", nullable=true)
     */
    private $hauteur_montant_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_genou_enfant", type="float", nullable=true)
     */
    private $hauteur_taille_genou_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_genou_enfant", type="float", nullable=true)
     */
    private $tour_genou_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_entrejambe_enfant", type="float", nullable=true)
     */
    private $hauteur_entrejambe_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_taille_cote_terre_enfant", type="float", nullable=true)
     */
    private $hauteur_taille_cote_terre_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="largeur_bas_pantalon_enfant", type="float", nullable=true)
     */
    private $largeur_bas_pantalon_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="hauteur_tete7_enfant", type="float", nullable=true)
     */
    private $hauteur_tete7_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="perimetre_cranien_enfant", type="float", nullable=true)
     */
    private $perimetre_cranien_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tour_visage_enfant", type="float", nullable=true)
     */
    private $tour_visage_enfant;
    
    /**
     * @var float
     *
     * @ORM\Column(name="ecart_poitrine_enfant", type="float", nullable=true)
     */
    private $ecart_poitrine_enfant;
    
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

    /**
     * Set tourPoitrineHomme
     *
     * @param float $tourPoitrineHomme
     *
     * @return Mesures
     */
    public function setTourPoitrineHomme($tourPoitrineHomme)
    {
        $this->tour_poitrine_homme = $tourPoitrineHomme;

        return $this;
    }

    /**
     * Get tourPoitrineHomme
     *
     * @return float
     */
    public function getTourPoitrineHomme()
    {
        return $this->tour_poitrine_homme;
    }

    /**
     * Set tourCeintureHomme
     *
     * @param float $tourCeintureHomme
     *
     * @return Mesures
     */
    public function setTourCeintureHomme($tourCeintureHomme)
    {
        $this->tour_ceinture_homme = $tourCeintureHomme;

        return $this;
    }

    /**
     * Get tourCeintureHomme
     *
     * @return float
     */
    public function getTourCeintureHomme()
    {
        return $this->tour_ceinture_homme;
    }

    /**
     * Set tourBassinHomme
     *
     * @param float $tourBassinHomme
     *
     * @return Mesures
     */
    public function setTourBassinHomme($tourBassinHomme)
    {
        $this->tour_bassin_homme = $tourBassinHomme;

        return $this;
    }

    /**
     * Get tourBassinHomme
     *
     * @return float
     */
    public function getTourBassinHomme()
    {
        return $this->tour_bassin_homme;
    }

    /**
     * Set longueurTailleDosHomme
     *
     * @param float $longueurTailleDosHomme
     *
     * @return Mesures
     */
    public function setLongueurTailleDosHomme($longueurTailleDosHomme)
    {
        $this->longueur_taille_dos_homme = $longueurTailleDosHomme;

        return $this;
    }

    /**
     * Get longueurTailleDosHomme
     *
     * @return float
     */
    public function getLongueurTailleDosHomme()
    {
        return $this->longueur_taille_dos_homme;
    }

    /**
     * Set longueurTailleDevantHomme
     *
     * @param float $longueurTailleDevantHomme
     *
     * @return Mesures
     */
    public function setLongueurTailleDevantHomme($longueurTailleDevantHomme)
    {
        $this->longueur_taille_devant_homme = $longueurTailleDevantHomme;

        return $this;
    }

    /**
     * Get longueurTailleDevantHomme
     *
     * @return float
     */
    public function getLongueurTailleDevantHomme()
    {
        return $this->longueur_taille_devant_homme;
    }

    /**
     * Set longueurTailleDevant7Homme
     *
     * @param float $longueurTailleDevant7Homme
     *
     * @return Mesures
     */
    public function setLongueurTailleDevant7Homme($longueurTailleDevant7Homme)
    {
        $this->longueur_taille_devant7_homme = $longueurTailleDevant7Homme;

        return $this;
    }

    /**
     * Get longueurTailleDevant7Homme
     *
     * @return float
     */
    public function getLongueurTailleDevant7Homme()
    {
        return $this->longueur_taille_devant7_homme;
    }

    /**
     * Set tourEncolureHomme
     *
     * @param float $tourEncolureHomme
     *
     * @return Mesures
     */
    public function setTourEncolureHomme($tourEncolureHomme)
    {
        $this->tour_encolure_homme = $tourEncolureHomme;

        return $this;
    }

    /**
     * Get tourEncolureHomme
     *
     * @return float
     */
    public function getTourEncolureHomme()
    {
        return $this->tour_encolure_homme;
    }

    /**
     * Set tourTeteHomme
     *
     * @param float $tourTeteHomme
     *
     * @return Mesures
     */
    public function setTourTeteHomme($tourTeteHomme)
    {
        $this->tour_tete_homme = $tourTeteHomme;

        return $this;
    }

    /**
     * Get tourTeteHomme
     *
     * @return float
     */
    public function getTourTeteHomme()
    {
        return $this->tour_tete_homme;
    }

    /**
     * Set hauteurTeteHomme
     *
     * @param float $hauteurTeteHomme
     *
     * @return Mesures
     */
    public function setHauteurTeteHomme($hauteurTeteHomme)
    {
        $this->hauteur_tete_homme = $hauteurTeteHomme;

        return $this;
    }

    /**
     * Get hauteurTeteHomme
     *
     * @return float
     */
    public function getHauteurTeteHomme()
    {
        return $this->hauteur_tete_homme;
    }

    /**
     * Set carrureDosHomme
     *
     * @param float $carrureDosHomme
     *
     * @return Mesures
     */
    public function setCarrureDosHomme($carrureDosHomme)
    {
        $this->carrure_dos_homme = $carrureDosHomme;

        return $this;
    }

    /**
     * Get carrureDosHomme
     *
     * @return float
     */
    public function getCarrureDosHomme()
    {
        return $this->carrure_dos_homme;
    }

    /**
     * Set carrureDevantHomme
     *
     * @param float $carrureDevantHomme
     *
     * @return Mesures
     */
    public function setCarrureDevantHomme($carrureDevantHomme)
    {
        $this->carrure_devant_homme = $carrureDevantHomme;

        return $this;
    }

    /**
     * Get carrureDevantHomme
     *
     * @return float
     */
    public function getCarrureDevantHomme()
    {
        return $this->carrure_devant_homme;
    }

    /**
     * Set longueurEpauleHomme
     *
     * @param float $longueurEpauleHomme
     *
     * @return Mesures
     */
    public function setLongueurEpauleHomme($longueurEpauleHomme)
    {
        $this->longueur_epaule_homme = $longueurEpauleHomme;

        return $this;
    }

    /**
     * Get longueurEpauleHomme
     *
     * @return float
     */
    public function getLongueurEpauleHomme()
    {
        return $this->longueur_epaule_homme;
    }

    /**
     * Set longueurBrasHomme
     *
     * @param float $longueurBrasHomme
     *
     * @return Mesures
     */
    public function setLongueurBrasHomme($longueurBrasHomme)
    {
        $this->longueur_bras_homme = $longueurBrasHomme;

        return $this;
    }

    /**
     * Get longueurBrasHomme
     *
     * @return float
     */
    public function getLongueurBrasHomme()
    {
        return $this->longueur_bras_homme;
    }

    /**
     * Set tourPoignetHomme
     *
     * @param float $tourPoignetHomme
     *
     * @return Mesures
     */
    public function setTourPoignetHomme($tourPoignetHomme)
    {
        $this->tour_poignet_homme = $tourPoignetHomme;

        return $this;
    }

    /**
     * Get tourPoignetHomme
     *
     * @return float
     */
    public function getTourPoignetHomme()
    {
        return $this->tour_poignet_homme;
    }

    /**
     * Set hauteurCorpsHomme
     *
     * @param float $hauteurCorpsHomme
     *
     * @return Mesures
     */
    public function setHauteurCorpsHomme($hauteurCorpsHomme)
    {
        $this->hauteur_corps_homme = $hauteurCorpsHomme;

        return $this;
    }

    /**
     * Get hauteurCorpsHomme
     *
     * @return float
     */
    public function getHauteurCorpsHomme()
    {
        return $this->hauteur_corps_homme;
    }

    /**
     * Set hauteurTailleTerreHomme
     *
     * @param float $hauteurTailleTerreHomme
     *
     * @return Mesures
     */
    public function setHauteurTailleTerreHomme($hauteurTailleTerreHomme)
    {
        $this->hauteur_taille_terre_homme = $hauteurTailleTerreHomme;

        return $this;
    }

    /**
     * Get hauteurTailleTerreHomme
     *
     * @return float
     */
    public function getHauteurTailleTerreHomme()
    {
        return $this->hauteur_taille_terre_homme;
    }

    /**
     * Set hauteurTailleBassinHomme
     *
     * @param float $hauteurTailleBassinHomme
     *
     * @return Mesures
     */
    public function setHauteurTailleBassinHomme($hauteurTailleBassinHomme)
    {
        $this->hauteur_taille_bassin_homme = $hauteurTailleBassinHomme;

        return $this;
    }

    /**
     * Get hauteurTailleBassinHomme
     *
     * @return float
     */
    public function getHauteurTailleBassinHomme()
    {
        return $this->hauteur_taille_bassin_homme;
    }

    /**
     * Set hauteurMontantHomme
     *
     * @param float $hauteurMontantHomme
     *
     * @return Mesures
     */
    public function setHauteurMontantHomme($hauteurMontantHomme)
    {
        $this->hauteur_montant_homme = $hauteurMontantHomme;

        return $this;
    }

    /**
     * Get hauteurMontantHomme
     *
     * @return float
     */
    public function getHauteurMontantHomme()
    {
        return $this->hauteur_montant_homme;
    }

    /**
     * Set enfourchureHomme
     *
     * @param float $enfourchureHomme
     *
     * @return Mesures
     */
    public function setEnfourchureHomme($enfourchureHomme)
    {
        $this->enfourchure_homme = $enfourchureHomme;

        return $this;
    }

    /**
     * Get enfourchureHomme
     *
     * @return float
     */
    public function getEnfourchureHomme()
    {
        return $this->enfourchure_homme;
    }

    /**
     * Set hauteurTailleGenouHomme
     *
     * @param float $hauteurTailleGenouHomme
     *
     * @return Mesures
     */
    public function setHauteurTailleGenouHomme($hauteurTailleGenouHomme)
    {
        $this->hauteur_taille_genou_homme = $hauteurTailleGenouHomme;

        return $this;
    }

    /**
     * Get hauteurTailleGenouHomme
     *
     * @return float
     */
    public function getHauteurTailleGenouHomme()
    {
        return $this->hauteur_taille_genou_homme;
    }

    /**
     * Set longueurEntrejambeHomme
     *
     * @param float $longueurEntrejambeHomme
     *
     * @return Mesures
     */
    public function setLongueurEntrejambeHomme($longueurEntrejambeHomme)
    {
        $this->longueur_entrejambe_homme = $longueurEntrejambeHomme;

        return $this;
    }

    /**
     * Get longueurEntrejambeHomme
     *
     * @return float
     */
    public function getLongueurEntrejambeHomme()
    {
        return $this->longueur_entrejambe_homme;
    }

    /**
     * Set tourCuisseHomme
     *
     * @param float $tourCuisseHomme
     *
     * @return Mesures
     */
    public function setTourCuisseHomme($tourCuisseHomme)
    {
        $this->tour_cuisse_homme = $tourCuisseHomme;

        return $this;
    }

    /**
     * Get tourCuisseHomme
     *
     * @return float
     */
    public function getTourCuisseHomme()
    {
        return $this->tour_cuisse_homme;
    }

    /**
     * Set tourMolletHomme
     *
     * @param float $tourMolletHomme
     *
     * @return Mesures
     */
    public function setTourMolletHomme($tourMolletHomme)
    {
        $this->tour_mollet_homme = $tourMolletHomme;

        return $this;
    }

    /**
     * Get tourMolletHomme
     *
     * @return float
     */
    public function getTourMolletHomme()
    {
        return $this->tour_mollet_homme;
    }

    /**
     * Set tourJarretHomme
     *
     * @param float $tourJarretHomme
     *
     * @return Mesures
     */
    public function setTourJarretHomme($tourJarretHomme)
    {
        $this->tour_jarret_homme = $tourJarretHomme;

        return $this;
    }

    /**
     * Get tourJarretHomme
     *
     * @return float
     */
    public function getTourJarretHomme()
    {
        return $this->tour_jarret_homme;
    }

    /**
     * Set longueurTailleDosEnfant
     *
     * @param float $longueurTailleDosEnfant
     *
     * @return Mesures
     */
    public function setLongueurTailleDosEnfant($longueurTailleDosEnfant)
    {
        $this->longueur_taille_dos_enfant = $longueurTailleDosEnfant;

        return $this;
    }

    /**
     * Get longueurTailleDosEnfant
     *
     * @return float
     */
    public function getLongueurTailleDosEnfant()
    {
        return $this->longueur_taille_dos_enfant;
    }

    /**
     * Set longueurTailleDevantEnfant
     *
     * @param float $longueurTailleDevantEnfant
     *
     * @return Mesures
     */
    public function setLongueurTailleDevantEnfant($longueurTailleDevantEnfant)
    {
        $this->longueur_taille_devant_enfant = $longueurTailleDevantEnfant;

        return $this;
    }

    /**
     * Get longueurTailleDevantEnfant
     *
     * @return float
     */
    public function getLongueurTailleDevantEnfant()
    {
        return $this->longueur_taille_devant_enfant;
    }

    /**
     * Set tourPoitrineEnfant
     *
     * @param float $tourPoitrineEnfant
     *
     * @return Mesures
     */
    public function setTourPoitrineEnfant($tourPoitrineEnfant)
    {
        $this->tour_poitrine_enfant = $tourPoitrineEnfant;

        return $this;
    }

    /**
     * Get tourPoitrineEnfant
     *
     * @return float
     */
    public function getTourPoitrineEnfant()
    {
        return $this->tour_poitrine_enfant;
    }

    /**
     * Set tourTailleEnfant
     *
     * @param float $tourTailleEnfant
     *
     * @return Mesures
     */
    public function setTourTailleEnfant($tourTailleEnfant)
    {
        $this->tour_taille_enfant = $tourTailleEnfant;

        return $this;
    }

    /**
     * Get tourTailleEnfant
     *
     * @return float
     */
    public function getTourTailleEnfant()
    {
        return $this->tour_taille_enfant;
    }

    /**
     * Set tourHanchesEnfant
     *
     * @param float $tourHanchesEnfant
     *
     * @return Mesures
     */
    public function setTourHanchesEnfant($tourHanchesEnfant)
    {
        $this->tour_hanches_enfant = $tourHanchesEnfant;

        return $this;
    }

    /**
     * Get tourHanchesEnfant
     *
     * @return float
     */
    public function getTourHanchesEnfant()
    {
        return $this->tour_hanches_enfant;
    }

    /**
     * Set tourEncolureEnfant
     *
     * @param float $tourEncolureEnfant
     *
     * @return Mesures
     */
    public function setTourEncolureEnfant($tourEncolureEnfant)
    {
        $this->tour_encolure_enfant = $tourEncolureEnfant;

        return $this;
    }

    /**
     * Get tourEncolureEnfant
     *
     * @return float
     */
    public function getTourEncolureEnfant()
    {
        return $this->tour_encolure_enfant;
    }

    /**
     * Set longueurEpauleEnfant
     *
     * @param float $longueurEpauleEnfant
     *
     * @return Mesures
     */
    public function setLongueurEpauleEnfant($longueurEpauleEnfant)
    {
        $this->longueur_epaule_enfant = $longueurEpauleEnfant;

        return $this;
    }

    /**
     * Get longueurEpauleEnfant
     *
     * @return float
     */
    public function getLongueurEpauleEnfant()
    {
        return $this->longueur_epaule_enfant;
    }

    /**
     * Set carrureDosEnfant
     *
     * @param float $carrureDosEnfant
     *
     * @return Mesures
     */
    public function setCarrureDosEnfant($carrureDosEnfant)
    {
        $this->carrure_dos_enfant = $carrureDosEnfant;

        return $this;
    }

    /**
     * Get carrureDosEnfant
     *
     * @return float
     */
    public function getCarrureDosEnfant()
    {
        return $this->carrure_dos_enfant;
    }

    /**
     * Set carrureDevantEnfant
     *
     * @param float $carrureDevantEnfant
     *
     * @return Mesures
     */
    public function setCarrureDevantEnfant($carrureDevantEnfant)
    {
        $this->carrure_devant_enfant = $carrureDevantEnfant;

        return $this;
    }

    /**
     * Get carrureDevantEnfant
     *
     * @return float
     */
    public function getCarrureDevantEnfant()
    {
        return $this->carrure_devant_enfant;
    }

    /**
     * Set longueurBrasEnfant
     *
     * @param float $longueurBrasEnfant
     *
     * @return Mesures
     */
    public function setLongueurBrasEnfant($longueurBrasEnfant)
    {
        $this->longueur_bras_enfant = $longueurBrasEnfant;

        return $this;
    }

    /**
     * Get longueurBrasEnfant
     *
     * @return float
     */
    public function getLongueurBrasEnfant()
    {
        return $this->longueur_bras_enfant;
    }

    /**
     * Set grosseurBrasEnfant
     *
     * @param float $grosseurBrasEnfant
     *
     * @return Mesures
     */
    public function setGrosseurBrasEnfant($grosseurBrasEnfant)
    {
        $this->grosseur_bras_enfant = $grosseurBrasEnfant;

        return $this;
    }

    /**
     * Get grosseurBrasEnfant
     *
     * @return float
     */
    public function getGrosseurBrasEnfant()
    {
        return $this->grosseur_bras_enfant;
    }

    /**
     * Set longueurCoudeEnfant
     *
     * @param float $longueurCoudeEnfant
     *
     * @return Mesures
     */
    public function setLongueurCoudeEnfant($longueurCoudeEnfant)
    {
        $this->longueur_coude_enfant = $longueurCoudeEnfant;

        return $this;
    }

    /**
     * Get longueurCoudeEnfant
     *
     * @return float
     */
    public function getLongueurCoudeEnfant()
    {
        return $this->longueur_coude_enfant;
    }

    /**
     * Set tourPoignetEnfant
     *
     * @param float $tourPoignetEnfant
     *
     * @return Mesures
     */
    public function setTourPoignetEnfant($tourPoignetEnfant)
    {
        $this->tour_poignet_enfant = $tourPoignetEnfant;

        return $this;
    }

    /**
     * Get tourPoignetEnfant
     *
     * @return float
     */
    public function getTourPoignetEnfant()
    {
        return $this->tour_poignet_enfant;
    }

    /**
     * Set hauteurTailleHanchesEnfant
     *
     * @param float $hauteurTailleHanchesEnfant
     *
     * @return Mesures
     */
    public function setHauteurTailleHanchesEnfant($hauteurTailleHanchesEnfant)
    {
        $this->hauteur_taille_hanches_enfant = $hauteurTailleHanchesEnfant;

        return $this;
    }

    /**
     * Get hauteurTailleHanchesEnfant
     *
     * @return float
     */
    public function getHauteurTailleHanchesEnfant()
    {
        return $this->hauteur_taille_hanches_enfant;
    }

    /**
     * Set hauteurMontantEnfant
     *
     * @param float $hauteurMontantEnfant
     *
     * @return Mesures
     */
    public function setHauteurMontantEnfant($hauteurMontantEnfant)
    {
        $this->hauteur_montant_enfant = $hauteurMontantEnfant;

        return $this;
    }

    /**
     * Get hauteurMontantEnfant
     *
     * @return float
     */
    public function getHauteurMontantEnfant()
    {
        return $this->hauteur_montant_enfant;
    }

    /**
     * Set hauteurTailleGenouEnfant
     *
     * @param float $hauteurTailleGenouEnfant
     *
     * @return Mesures
     */
    public function setHauteurTailleGenouEnfant($hauteurTailleGenouEnfant)
    {
        $this->hauteur_taille_genou_enfant = $hauteurTailleGenouEnfant;

        return $this;
    }

    /**
     * Get hauteurTailleGenouEnfant
     *
     * @return float
     */
    public function getHauteurTailleGenouEnfant()
    {
        return $this->hauteur_taille_genou_enfant;
    }

    /**
     * Set tourGenouEnfant
     *
     * @param float $tourGenouEnfant
     *
     * @return Mesures
     */
    public function setTourGenouEnfant($tourGenouEnfant)
    {
        $this->tour_genou_enfant = $tourGenouEnfant;

        return $this;
    }

    /**
     * Get tourGenouEnfant
     *
     * @return float
     */
    public function getTourGenouEnfant()
    {
        return $this->tour_genou_enfant;
    }

    /**
     * Set hauteurEntrejambeEnfant
     *
     * @param float $hauteurEntrejambeEnfant
     *
     * @return Mesures
     */
    public function setHauteurEntrejambeEnfant($hauteurEntrejambeEnfant)
    {
        $this->hauteur_entrejambe_enfant = $hauteurEntrejambeEnfant;

        return $this;
    }

    /**
     * Get hauteurEntrejambeEnfant
     *
     * @return float
     */
    public function getHauteurEntrejambeEnfant()
    {
        return $this->hauteur_entrejambe_enfant;
    }

    /**
     * Set hauteurTailleCoteTerreEnfant
     *
     * @param float $hauteurTailleCoteTerreEnfant
     *
     * @return Mesures
     */
    public function setHauteurTailleCoteTerreEnfant($hauteurTailleCoteTerreEnfant)
    {
        $this->hauteur_taille_cote_terre_enfant = $hauteurTailleCoteTerreEnfant;

        return $this;
    }

    /**
     * Get hauteurTailleCoteTerreEnfant
     *
     * @return float
     */
    public function getHauteurTailleCoteTerreEnfant()
    {
        return $this->hauteur_taille_cote_terre_enfant;
    }

    /**
     * Set largeurBasPantalonEnfant
     *
     * @param float $largeurBasPantalonEnfant
     *
     * @return Mesures
     */
    public function setLargeurBasPantalonEnfant($largeurBasPantalonEnfant)
    {
        $this->largeur_bas_pantalon_enfant = $largeurBasPantalonEnfant;

        return $this;
    }

    /**
     * Get largeurBasPantalonEnfant
     *
     * @return float
     */
    public function getLargeurBasPantalonEnfant()
    {
        return $this->largeur_bas_pantalon_enfant;
    }

    /**
     * Set hauteurTete7Enfant
     *
     * @param float $hauteurTete7Enfant
     *
     * @return Mesures
     */
    public function setHauteurTete7Enfant($hauteurTete7Enfant)
    {
        $this->hauteur_tete7_enfant = $hauteurTete7Enfant;

        return $this;
    }

    /**
     * Get hauteurTete7Enfant
     *
     * @return float
     */
    public function getHauteurTete7Enfant()
    {
        return $this->hauteur_tete7_enfant;
    }

    /**
     * Set perimetreCranienEnfant
     *
     * @param float $perimetreCranienEnfant
     *
     * @return Mesures
     */
    public function setPerimetreCranienEnfant($perimetreCranienEnfant)
    {
        $this->perimetre_cranien_enfant = $perimetreCranienEnfant;

        return $this;
    }

    /**
     * Get perimetreCranienEnfant
     *
     * @return float
     */
    public function getPerimetreCranienEnfant()
    {
        return $this->perimetre_cranien_enfant;
    }

    /**
     * Set tourVisageEnfant
     *
     * @param float $tourVisageEnfant
     *
     * @return Mesures
     */
    public function setTourVisageEnfant($tourVisageEnfant)
    {
        $this->tour_visage_enfant = $tourVisageEnfant;

        return $this;
    }

    /**
     * Get tourVisageEnfant
     *
     * @return float
     */
    public function getTourVisageEnfant()
    {
        return $this->tour_visage_enfant;
    }

    /**
     * Set ecartPoitrineEnfant
     *
     * @param float $ecartPoitrineEnfant
     *
     * @return Mesures
     */
    public function setEcartPoitrineEnfant($ecartPoitrineEnfant)
    {
        $this->ecart_poitrine_enfant = $ecartPoitrineEnfant;

        return $this;
    }

    /**
     * Get ecartPoitrineEnfant
     *
     * @return float
     */
    public function getEcartPoitrineEnfant()
    {
        return $this->ecart_poitrine_enfant;
    }
}
