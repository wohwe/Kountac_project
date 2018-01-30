<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Produits_3Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('taille','choice',array('choices' => array('XS' => 'XS',
                                                              'S' => 'S',
                                                              'L' => 'L',
                                                              'M' => 'M',
                                                             'XL' => 'XL',
                                                            'XXL' => 'XXL'),
                                            'label' => 'Taille du produit*',
                                            'required' => true,
                                            'attr' => array('class' => 'select form-control')))
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
                                              'label' => 'Votre stock pour ce produit*',
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
            'data_class' => 'Kountac\KountacBundle\Entity\Produits_3'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_produits_3';
    }


}
