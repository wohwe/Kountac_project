<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class TriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prix', RangeType::class, array('attr' => array('min' => 5,
                                                                  'max' => 100000,
                                                                  'class' => 'slider-range-price',
                'empty_data' => 'John Doe',),'data' => 'abcdef'
            ));
    }
    
    public function getName() 
    {
        return 'kountac_kountacbundle_tri';
    }
    
}