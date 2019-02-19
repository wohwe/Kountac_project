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
        $builder->add('nom')->add('prenom')->add('sexe')->add('pays')->add('adresse')->add('rue')->add('ville')->add('cp')->add('telephone')->add('telephonefix')->add('code')->add('codeparrain')->add('marque')->add('pays_entreprise')->add('ville_entreprise')->add('adresse_entreprise')->add('rue_entreprise')->add('cp_entreprise')->add('telephone_entreprise')->add('telephonefix_entreprise')->add('image')->add('service_livraison')->add('service_paiement');
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
