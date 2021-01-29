<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Taille_PoidsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille','text', array('attr' => array('class' => 'input form-control',
                                                            'placeholder' => 'exemple 1.8',),
                                            'label' => "Entrer votre taille en m",
                                            'required' => false,))
            ->add('poids','text', array('attr' => array('class' => 'input form-control',
                                                            'placeholder' => 'exemple 65',),
                                            'label' => "Entrer votre poids en Kg",
                                            'required' => false,))
        ;
    }
    
    public function getName() 
    {
        return 'kountac_kountacbundle_Taillepoids';
    }
    
}