<?php
 
namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivraisonCheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','choice',array('choices' => array('Null' => 'Pas de service de livraison',
                                                        'SMS' => 'SMS',
                                                        'TCCE' => 'TCCE',
                                                         'MTA' => 'MTA',
                                                         'DHL' => 'DHL'),
                                        'label' => 'Choisir un service de livraison*',
                                        'attr' => array('class' => 'select form-control')))
        ;
    }
 

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\ServiceLivraison'
        ));
    }
 
}