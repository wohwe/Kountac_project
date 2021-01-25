<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Kountac\KountacBundle\Form\DevisesCFAType;
use Kountac\KountacBundle\Form\DevisesEuroType;

class ProduitsEditPaysType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                        
                ->add('euro', new DevisesEuroType(), array('attr' => array('required' => false)))
                ->add('cfa', new DevisesCFAType(), array('attr' => array('required' => false)))
                ;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_produits';
    }


}
