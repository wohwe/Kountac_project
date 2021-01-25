<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Media_motifType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file', array('required' => true))
            ->add('file2','file', array('required' => false))
            ->add('file3','file', array('required' => false))
            ->add('mannequin','entity', array('class' => 'KountacBundle:Mannequin',
                                             'label'=> 'Choisir un mannequin', 
                                             'attr' => array('class' => 'select form-control'),
                                             ))
            ->add('top','choice', array('choices' => array('0' => 'Oui',
                                                           '1' => 'Non'),'expanded'=>true,'label' => 'Définir comme mannequin par défaut','required' => true))
                
                
            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Media_motif'
        ));
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'kountac_kountacbundle_media';
    }
}
