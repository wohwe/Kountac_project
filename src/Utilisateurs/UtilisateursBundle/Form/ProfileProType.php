<?php

namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Kountac\KountacBundle\Form\Media_EditType;

class ProfileProType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('marque','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom de la marque*'))
                ->add('adresse_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Adresse'))
                ->add('description_entreprise','textarea', array('attr' => array('rows' => 5, 'class' => 'input form-control'),'label' => 'A propos de vous*','required' => false))
                ->add('pays_entreprise','country', array('attr' => array('class' => 'select form-control'),'label' => 'Pays de résidence*'))
                ->add('ville_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Ville de résidence*'))
                ->add('telephone_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone fixe 1*'))
                ->add('cp_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Code postal*'))
                ->add('telephonefix_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone fixe 2'))
                ->add('rue_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Rue'))
                
                ->add('nom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom(s)'))
                ->add('prenom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Prénom(s)'))
                
                ->add('sexe','choice', array('choices' => array('0' => 'M.',
                                                                '1' => 'Mme.'),'expanded'=>true))
                
                ->add('adresse','text', array('attr' => array('class' => 'input form-control'),'label' => 'Adresse'))
                ->add('pays','country', array('attr' => array('class' => 'select form-control'),'label' => 'Pays'))
                ->add('ville','text', array('attr' => array('class' => 'input form-control'),'label' => 'Ville'))
                ->add('rue','text', array('attr' => array('class' => 'input form-control'),'label' => 'Rue'))
                ->add('cp','text', array('attr' => array('class' => 'input form-control'),'label' => 'Code postal'))
                ->add('telephone','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone mobile'))
                ->add('telephonefix','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone fixe'))
                ->add('image', new Media_EditType())
                ;
        }
    
    public function getParent() {
        return 'fos_user_profile';
    }
    
    public function getName() 
    {
        return 'ornoir_pro_profile';
    }
}