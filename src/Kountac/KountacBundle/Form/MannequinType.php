<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MannequinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('file','file', array('required' => true, 'label' => false))
                ->add('nom_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Nom du mannequin*'))
                ->add('taille_standard_mannequin','choice',array('choices' => array(
                                                                    '32' => '32',
                                                                    '34' => '34',
                                                                   '36' => '36',
                                                                   '38' => '38',
                                                                   '40' => '40',
                                                                   '42' => '42',
                                                                   '44' => '44',
                                                                   '46' => '46',
                                                                   '48' => '48',
                                                                   '50' => '50',),
                                                'label' => 'Choisir la taille standard*',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))
                ->add('poids_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Poids du mannequin (Kg)*'))
                ->add('taille_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Taille du mannequin (mètre)*'))
                ->add('numero_teint_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Numéro teint de peau (nomenclature des fonds de teint)*'))
                ->add('tour_taille_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Tour de taille (cm)*'))
                ->add('tour_poitrine_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Tour de Poitrine (cm)*'))
                ->add('tour_grandes_hanches_mannequin','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Tour des grandes hanches (cm)*'))
                ->add('statut_mannequin','choice',array('choices' => array(
                                                                    'disponible' => 'Disponible pour avatar',
                                                                    'indisponible' => 'Indisponible',
                                                                   'reserve' => 'Réservé à la marque',
                                                                   ),
                                                'label' => 'Statut du mannequin*',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Mannequin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_mannequin';
    }


}
