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
                ->add('taille','choice',array('choices' => array('34' => '34',
                                                              '36' => '36',
                                                              '38' => '38',
                                                              '40' => '40',
                                                             '42' => '42',
                                                             '44' => '44',
                                                             '46' => '46',
                                                             '48' => '48',
                                                            '50' => '50'),
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
