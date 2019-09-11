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
        $builder->add('nom', 'attr' => array('class' => 'input form-control'))
                ->add('prenom', 'attr' => array('class' => 'input form-control'))
                ->add('username', 'attr' => array('class' => 'input form-control'))
                ->add('sexe', 'attr' => array('class' => 'input form-control'))
                ->add('pays', 'attr' => array('class' => 'input form-control'))
                ->add('adresse', 'attr' => array('class' => 'input form-control'))
                ->add('rue', 'attr' => array('class' => 'input form-control'))
                ->add('ville', 'attr' => array('class' => 'input form-control'))
                ->add('cp', 'attr' => array('class' => 'input form-control'))
                ->add('telephone', 'attr' => array('class' => 'input form-control'))
                ->add('telephonefix', 'attr' => array('class' => 'input form-control'))
                ->add('code', 'attr' => array('class' => 'input form-control'))
                ->add('codeparrain', 'attr' => array('class' => 'input form-control'))
                ->add('marque', 'attr' => array('class' => 'input form-control'))
                ->add('pays_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('ville_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('adresse_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('rue_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('cp_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('telephone_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('telephonefix_entreprise', 'attr' => array('class' => 'input form-control'))
                ->add('image', 'attr' => array('class' => 'input form-control'))
                ->add('service_livraison', 'attr' => array('class' => 'input form-control'))
                ->add('service_paiement', 'attr' => array('class' => 'input form-control'))
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
