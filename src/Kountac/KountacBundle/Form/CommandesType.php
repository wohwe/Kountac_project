<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Kountac\KountacBundle\Form\Media_motifType;

class CommandesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('intitule','text', array('attr' => array('class' => 'input form-control'),'label' => 'Intitulé commande*'))
                ->add('contenu', 'textarea', array('label' => 'Description de votre commande*', 'attr' => array('rows' => 8, 'class' => 'form-control')))
                ->add('image', new Media_motifType())
                ->add('categorie',null , array('attr' => array('class' => 'select form-control'),'label' => 'Choisir une catégorie'))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Commandes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_commandes';
    }


}
