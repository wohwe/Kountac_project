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
            ->add('titulaire','text', array('attr' => array('class' => 'input form-control'),'label' => 'Titulaire mesures*'))
            ->add('genre','choice',array('choices' => array('femme' => 'Femme',
                                                          'homme' => 'Homme',
                                                          'adolescent' => 'Adolescent',
                                                          'enfant' => 'Enfant'),
                                        'label' => 'Choisir genre*',
                                        'attr' => array('class' => 'select form-control')))
            ->add('poitrine','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poitrine'))
            ->add('hauteur_poitrine','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de poitrine'))
            ->add('demi_ecart_poitrine','text', array('attr' => array('class' => 'input form-control'),'label' => 'Demi écrat poitrine'))
            ->add('tour_petites_hanches','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour des petites hanches'))
            ->add('tour_grandes_hanches','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour des grandes hanches'))
            ->add('demi_tour_encolure','text', array('attr' => array('class' => 'input form-control'),'label' => 'Demi tour d\'encolure'))
            ->add('demi_carrure_dos','text', array('attr' => array('class' => 'input form-control'),'label' => 'Demi carrure dos'))
            ->add('demi_carrure_devant','text', array('attr' => array('class' => 'input form-control'),'label' => 'Demi carrure devant'))
            ->add('taille','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de taille'))
            ->add('bassin','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de bassin'))
            ->add('epaules','text', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre épaules'))
            ->add('seins','text', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre les seins'))
            ->add('epauletaille','text', array('attr' => array('class' => 'input form-control'),'label' => 'Distance entre épaule-taille'))
            ->add('longueur','text', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur du vêtement'))
            ->add('taille_dos','text', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille dos'))
            ->add('taille_devant','text', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur taille devant'))
            ->add('longueur_epaule','text', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur épaule'))
            ->add('tour_emmanchure','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour d\'emmanchure'))
            ->add('hauteur_dessous_bras','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur dessous bras'))
            ->add('longueur_bras','text', array('attr' => array('class' => 'input form-control'),'label' => 'Longueur du bras'))
            ->add('grosseur_bras','text', array('attr' => array('class' => 'input form-control'),'label' => 'Grosseur du bras'))
            ->add('hauteur_coude','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur du coude'))
            ->add('tour_poignet','text', array('attr' => array('class' => 'input form-control'),'label' => 'Tour de poignet'))
            ->add('hauteur_taille_hanche','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille-hanches'))
            ->add('hauteur_montant','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur de montant'))
            ->add('enfourchure','text', array('attr' => array('class' => 'input form-control'),'label' => 'Enfourchure'))
            ->add('hauteur_taille_genou','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille au genou'))
            ->add('hauteur_taille_terre','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille à terre'))
            ->add('hauteur_taille_cote_terre','text', array('attr' => array('class' => 'input form-control'),'label' => 'Hauteur taille côté à terre'))
            
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
