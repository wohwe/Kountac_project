<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProduitsAddPriceCommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('prixCommande','text', array('attr' => array('class' => 'input form-control',
                                                                   'required' => false),
                                           'label' => 'Prix pour commande'))
               ;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_addpricecommande';
    }


}
