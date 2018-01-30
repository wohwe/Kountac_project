<?php
 
namespace Utilisateurs\UtilisateursBundle\Form;
 
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractType;
class AdressCheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
                ->add('nom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom(s)*'))
                ->add('prenom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Prénom(s)'))
                ->add('adresse','text', array('attr' => array('class' => 'input form-control'),'label' => 'Adresse'))
                ->add('pays','country', array('attr' => array('class' => 'select form-control'),'label' => 'Pays*'))
                ->add('ville', 'text', array('attr' => array('class' => 'input form-control'),'label' => 'Ville*'))
                ->add('rue', 'text', array('attr' => array('class' => 'input form-control'),'label' => 'Rue'))
                ->add('cp','text', array('attr' => array('class' => 'input form-control'),'label' => 'Code postal'))
                ->add('telephone','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone mobile*'))
                ->add('telephonefix','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone fixe'))
                ;
    }
 
    public function getParent() {
        return 'fos_user_profile';
    }
}