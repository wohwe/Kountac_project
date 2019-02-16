<?php
 
namespace Utilisateurs\UtilisateursBundle\Form;
 
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Utilisateurs\UtilisateursBundle\Form\EventListener\AddRoleFieldSubscriber;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Kountac\KountacBundle\Form\MediaType;

class RegistrationProType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
                
                ->add('marque','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom de la marque*','required' => true))
                ->add('description_entreprise','textarea', array('attr' => array('rows' => 5, 'class' => 'input form-control'),'label' => 'A propos de la marque*','required' => true))
                ->add('adresse_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Adresse','required' => false))
                ->add('pays_entreprise','country', array('attr' => array('class' => 'select form-control'),'label' => 'Pays de résidence*','required' => true))
                ->add('ville_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Ville de résidence*','required' => true))
                ->add('telephone_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone 1*','required' => true))
                ->add('cp_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Code postal','required' => false))
                ->add('telephonefix_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone 2','required' => false))
                ->add('rue_entreprise','text', array('attr' => array('class' => 'input form-control'),'label' => 'Rue','required' => false))
                
                ->add('nom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Nom(s)*','required' => true))
                ->add('prenom','text', array('attr' => array('class' => 'input form-control'),'label' => 'Prénom(s)','required' => false))
                
                ->add('sexe','choice', array('choices' => array('0' => 'M.',
                                                                '1' => 'Mme.'),'expanded'=>true, 'required' => true))
                
                ->add('adresse','text', array('attr' => array('class' => 'input form-control'),'label' => 'Adresse*','required' => true))
                ->add('pays','country', array('attr' => array('class' => 'select form-control'),'label' => 'Pays/Région*','required' => true))
                ->add('ville','text', array('attr' => array('class' => 'input form-control'),'label' => 'Ville*','required' => true))
                ->add('departement','text', array('attr' => array('class' => 'input form-control'),'label' => 'Département','required' => true))
                ->add('digicode','number', array('attr' => array('class' => 'input form-control'),'label' => 'Digicode','required' => false))
                ->add('rue','text', array('attr' => array('class' => 'input form-control'),'label' => 'Complément d\'adresse','required' => false))
                ->add('cp','number', array('attr' => array('class' => 'input form-control'),'label' => 'Code postal*','required' => true))
                ->add('telephone','number', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone mobile','required' => true))
                ->add('telephonefix','number', array('attr' => array('class' => 'input form-control'),'label' => 'Téléphone 2','required' => false))
                ->add('image', new MediaType())
                ;
                $builder->addEventSubscriber(new AddRoleFieldSubscriber());
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(['translation_domain' => 'FOSUserBundle']);
    }
 
    public function getName()
    {
        return 'ornoir_pro_registration';
    }
    
}