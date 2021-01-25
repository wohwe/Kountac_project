<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Libelles_motifType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle','text', array('attr' => array('class' => 'input form-control'),
                                        'required' => true,
                                        'label' => 'Libellé du motif*'))
            ->add('file','file', array('required' => true, 'label' => false))
            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Libelles_motif'
        ));
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'kountac_kountacbundle_libelles_motifs';
    }
}
