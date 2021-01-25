<?php

namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MesuresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulaire','text', array('attr' => array('class' => 'input form-control'),'label' => 'Titulaire mesures*','required' => true))
            ->add('poitrine','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poitrine','required' => false))
            ->add('hauteur_poitrine','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de poitrine','required' => false))
            ->add('demi_ecart_poitrine','number', array('attr' => array('class' => 'input form-control'),'label' => 'Demi écrat poitrine','required' => false))
            ->add('tour_petites_hanches','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour des petites hanches','required' => false))
            ->add('tour_grandes_hanches','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour des grandes hanches','required' => false))
            ->add('demi_tour_encolure','number', array('attr' => array('class' => 'input form-control'),'label' => 'Demi tour d\'encolure','required' => false))
            ->add('demi_carrure_dos','number', array('attr' => array('class' => 'input form-control'),'label' => 'Demi carrure dos','required' => false))
            ->add('demi_carrure_devant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Demi carrure devant','required' => false))
            ->add('taille','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de taille','required' => false))
            ->add('bassin','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de bassin','required' => false))
            ->add('epaules','number', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre épaules','required' => false))
            ->add('seins','number', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre les seins','required' => false))
            ->add('epauletaille','number', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre épaule-taille','required' => false))
            ->add('longueur','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur du vêtement','required' => false))
            ->add('taille_dos','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille dos','required' => false))
            ->add('taille_devant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille devant','required' => false))
            ->add('longueur_epaule','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur épaule','required' => false))
            ->add('tour_emmanchure','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour d\'emmanchure','required' => false))
            ->add('hauteur_dessous_bras','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur dessous bras','required' => false))
            ->add('longueur_bras','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur du bras','required' => false))
            ->add('grosseur_bras','number', array('attr' => array('class' => 'input form-control'),'label' => 'Grosseur du bras','required' => false))
            ->add('hauteur_coude','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur du coude','required' => false))
            ->add('tour_poignet','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poignet','required' => false))
            ->add('hauteur_taille_hanche','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille-hanches','required' => false))
            ->add('hauteur_montant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de montant','required' => false))
            ->add('enfourchure','number', array('attr' => array('class' => 'input form-control'),'label' => 'Enfourchure','required' => false))
            ->add('hauteur_taille_genou','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille au genou','required' => false))
            ->add('hauteur_taille_terre','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille à terre','required' => false))
            ->add('hauteur_taille_cote_terre','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille côté à terre','required' => false))
            //Mesures hommes
            ->add('tour_poitrine_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poitrine','required' => false))
            ->add('tour_ceinture_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de ceinture','required' => false))
            ->add('tour_bassin_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de bassin','required' => false))
            ->add('longueur_taille_dos_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille dos','required' => false))
            ->add('longueur_taille_devant_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille devant','required' => false))
            ->add('longueur_taille_devant7_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille devant depuis la 7eme cervicale','required' => false))
            ->add('tour_encolure_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour d\'encolure','required' => false))
            ->add('tour_tete_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de tête','required' => false))
            ->add('hauteur_tete_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de tête','required' => false))
            ->add('carrure_dos_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Carrure dos','required' => false))
            ->add('carrure_devant_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Carrure devant','required' => false))
            ->add('longueur_epaule_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur épaule','required' => false))
            ->add('longueur_bras_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur bras','required' => false))
            ->add('tour_poignet_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poignet','required' => false))
            ->add('hauteur_corps_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur du corps','required' => false))
            ->add('hauteur_taille_terre_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille à terre','required' => false))
            ->add('hauteur_taille_bassin_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille-bassin','required' => false))
            ->add('hauteur_montant_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de montant','required' => false))
            ->add('enfourchure_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Enfourchure','required' => false))
            ->add('hauteur_taille_genou_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille au genou','required' => false))
            ->add('longueur_entrejambe_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur d\'entrejambe','required' => false))
            ->add('tour_cuisse_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de cuisse','required' => false))
            ->add('tour_mollet_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de mollet','required' => false))
            ->add('tour_jarret_homme','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de jarret','required' => false))
            //Mesures enfants
            ->add('longueur_taille_dos_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille dos','required' => false))
            ->add('longueur_taille_devant_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille devant','required' => false))
            ->add('tour_poitrine_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poitrine','required' => false))
            ->add('tour_taille_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de taille','required' => false))
            ->add('tour_hanches_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de hanches','required' => false))
            ->add('tour_encolure_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour d\'encolure','required' => false))
            ->add('longueur_epaule_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur épaule','required' => false))
            ->add('carrure_dos_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Carrure dos','required' => false))
            ->add('carrure_devant_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Carrure devant','required' => false))
            ->add('longueur_bras_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur bras','required' => false))
            ->add('grosseur_bras_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Grosseur bras','required' => false))
            ->add('longueur_coude_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur au coude','required' => false))
            ->add('tour_poignet_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poignet','required' => false))
            ->add('hauteur_taille_hanches_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille-hanches','required' => false))
            ->add('hauteur_montant_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de montant','required' => false))
            ->add('hauteur_taille_genou_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille au genou','required' => false))
            ->add('tour_genou_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de genou','required' => false))
            ->add('hauteur_entrejambe_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur d\'entrejambe','required' => false))
            ->add('hauteur_taille_cote_terre_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille côté à terre','required' => false))
            ->add('largeur_bas_pantalon_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Largeur de bas de pantalon','required' => false))
            ->add('hauteur_tete7_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de tête depuis la 7eme cervicale','required' => false))
            ->add('perimetre_cranien_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Périmètre cranien','required' => false))
            ->add('tour_visage_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de visage','required' => false))
            ->add('ecart_poitrine_enfant','number', array('attr' => array('class' => 'input form-control'),'label' => 'Ecart de poitrine (filles de 8 à 14ans)','required' => false))
            
        
                ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Mesures'
        ));
    }
}
