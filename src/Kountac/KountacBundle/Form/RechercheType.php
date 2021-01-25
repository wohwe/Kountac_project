<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recherche','text', array('attr' => array('class' => 'form-control',
                                                            'placeholder' => 'Rechercher',),
                                            'label' => false))
        ;
    }
    
    public function getName() 
    {
        return 'kountac_kountacbundle_recherche';
    }
    
}