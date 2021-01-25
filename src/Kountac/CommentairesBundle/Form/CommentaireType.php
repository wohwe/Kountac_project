<?php

namespace Kountac\CommentairesBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo','text', array('attr' => array('class' => 'input form-control'),'label' => 'Pseudo*'))
            ->add('contenu', 'textarea', array('label' => 'Votre commentaire*','attr' => array('rows' => 5, 'class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\CommentairesBundle\Entity\Commentaires'
        ));
    }
}
