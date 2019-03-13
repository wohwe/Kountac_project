<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('titre','text', array('attr' => array('class' => 'input form-control'),'required' => true, 'label' => 'Titre*'))
                ->add('type','choice', array('choices' => array('Liens' => 'Liens',
                                                        'Texte' => 'Texte'),
                                                'label' => 'Type*',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))

                ->add('categorie','choice', array('choices' => array(
                                                        'Information' => 'Information',
                                                        'Aide' => 'Aide',
                                                        'Collection' => 'Collection',
                                                        'Nous_contacter' => 'Nous contacter'),
                                                'label' => 'Categories*',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))
                
                ->add('contenu', 'textarea', array('attr' => array('class' => 'editor')))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Pages'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_produits_1';
    }


}
