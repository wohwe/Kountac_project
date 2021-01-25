<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Produits_1Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom','text', array('attr' => array('class' => 'input form-control'),'required' => true, 'label' => 'Nom*'))
                ->add('matiere','choice', array('choices' => array('Coton' => 'Coton',
                                                                'Synthétique' => 'Synthétique',
                                                               'Soie' => 'Soie',
                                                               'Laine' => 'Laine',
                                                               'Kapok' => 'Kapok',
                                                               'Raphia' => 'Raphia',
                                                               'Lin' => 'Lin',
                                                               'Polyamide' => 'Polyamide',
                                                               'Polyester' => 'Polyester',
                                                               'Polyacrilique' => 'Polyacrilique',
                                                               'Polyurethane' => 'Polyurethane',
                                                               'Viscosse' => 'Viscosse',
                                                               'Cuir' => 'Cuir',
                                                               'Velours' => 'Velours',
                                                               'Maille' => 'Maille',
                                                               'Dentelle' => 'Dentelle',
                                                               'Guipure' => 'Guipure',
                                                               'Tuile' => 'Tuile',
                                                               'Tergal' => 'Tergal',
                                                               'Tuile' => 'Tuile',
                                                              'Nylon' => 'Nylon'),
                                                'label' => 'Matière*',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))
                
                ->add('description', 'textarea', array('label' => 'Description du produit*', 'required' => true, 'attr' => array('rows' => 6, 'class' => 'form-control')))
                ->add('conditions_utilisation', 'textarea', array('label' => 'Conditions d\'utilisation', 'required' => false, 'attr' => array('rows' => 6, 'class' => 'form-control')))
                ->add('categorie',null , array('attr' => array('class' => 'select form-control'), 'required' => true, 'label' => 'Choisir catégorie*'))
                ->add('looks',null , array('attr' => array('class' => 'select form-control'), 'required' => true, 'label' => 'Idées look*'))
                ->add('collection',null , array('attr' => array('class' => 'select form-control'), 'required' => true,'label' => 'Choisir collection*'))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Produits_1'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_produits_1';
    }


}
