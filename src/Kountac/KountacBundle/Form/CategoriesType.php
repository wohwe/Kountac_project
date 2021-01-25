<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoriesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom*'))
                ->add('parent',null , array('attr' => array('class' => 'select form-control', 'required' => false),'label' => 'Choisir catégorie parente'))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Categories'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_categories';
    }


}
