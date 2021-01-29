<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProduitsAddStockType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('stock','choice',array('choices' => array('1' => '1',
                                                          '2' => '2',
                                                          '3' => '3',
                                                          '4' => '4',
                                                          '5' => '5',
                                                          '6' => '6',
                                                          '7' => '7',
                                                          '8' => '8',
                                                          '9' => '9',
                                                          '10' => '10',
                                                          '11' => '11',
                                                          '12' => '12',
                                                          '13' => '13',
                                                          '14' => '14',
                                                          '15' => '15'),
                                              'label' => 'Choisir stock',
                                              'attr' => array('class' => 'select form-control')))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_stock';
    }


}
