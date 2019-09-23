<?php

namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', array('attr' => array('class' => 'input form-control')))
                ->add('prenom', array('attr' => array('class' => 'input form-control')))
                ->add('username', array('attr' => array('class' => 'input form-control')))
                ->add('sexe', array('attr' => array('class' => 'input form-control')))
                ->add('pays', array('attr' => array('class' => 'input form-control')))
                ->add('adresse', array('attr' => array('class' => 'input form-control')))
                ->add('rue', array('attr' => array('class' => 'input form-control')))
                ->add('ville', array('attr' => array('class' => 'input form-control')))
                ->add('cp', array('attr' => array('class' => 'input form-control')))
                ->add('telephone', array('attr' => array('class' => 'input form-control')))
                ->add('telephonefix', array('attr' => array('class' => 'input form-control')))
                ->add('code', array('attr' => array('class' => 'input form-control')))
                ->add('codeparrain', array('attr' => array('class' => 'input form-control')))
                ->add('marque', array('attr' => array('class' => 'input form-control')))
                ->add('pays_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('ville_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('adresse_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('rue_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('cp_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('telephone_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('telephonefix_entreprise', array('attr' => array('class' => 'input form-control')))
                ->add('image', array('attr' => array('class' => 'input form-control')))
                ->add('service_livraison', array('attr' => array('class' => 'input form-control')))
                ->add('service_paiement', array('attr' => array('class' => 'input form-control')))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'utilisateurs_utilisateursbundle_utilisateurs';
    }


}
