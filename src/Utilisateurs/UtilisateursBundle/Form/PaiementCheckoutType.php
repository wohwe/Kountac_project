<?php
 
namespace Utilisateurs\UtilisateursBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaiementCheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom','choice',array('choices' => array('Visa' => 'Visa',
                                                              'MasterCard' => 'MasterCard',
                                                              'PayPal' => 'PayPal',
                                                              'PaiementLivraison' => 'Paiement à la livraison'),
                                            'label' => 'Choisir type de paiement*',
                                            'attr' => array('class' => 'select form-control')))
                ->add('titulaire','text', array('required' => true,'attr' => array('class' => 'input form-control'),'label' => 'Titulaire carte'))
                ->add('numero','text', array('required' => true,'attr' => array('class' => 'input form-control'),'label' => 'Numéro de la carte'))
                ->add('numeroverification','text', array('required' => true,'attr' => array('class' => 'input form-control'),'label' => 'Numéro de vérification*'))
                ->add('moisexp','choice',array('choices' => array('Null' => 'Mois d\'expiration',
                                                                    '01' => 'Janvier',
                                                                    '02' => 'Février',
                                                                    '03' => 'Mars',
                                                                    '04' => 'Avril',
                                                                    '05' => 'Mai',
                                                                    '06' => 'Juin',
                                                                    '07' => 'Juillet',
                                                                    '08' => 'Août',
                                                                    '09' => 'Septembre',
                                                                    '10' => 'Octobre',
                                                                    '11' => 'Novembre',
                                                                    '12' => 'Décembre',               
                                                                    ),
                                        'required' => true,
                                        'label' => 'Mois exp.*',
                                        'attr' => array('class' => 'select form-control')))
                ->add('anneeexp','choice',array('choices' => array('Null' => 'Année d\'expiration',
                                                                    '2018' => '2018',
                                                                    '2019' => '2019',
                                                                    '2020' => '2020',
                                                                    '2021' => '2021',
                                                                    '2022' => '2022',
                                                                    '2023' => '2023',
                                                                    '2024' => '2024',
                                                                    '2025' => '2025',
                                                                    '2026' => '2026',
                                                                    '2027' => '2027',
                                                                    '2028' => '2028',
                                                                    '2029' => '2029',
                                                                    '2030' => '2030',
                                                                    '2031' => '2031',
                                                                    '2032' => '2032',
                                                                    '2033' => '2033',
                                                                    '2034' => '2034',
                                                                    '2035' => '2035'),
                                        'required' => true,
                                        'label' => 'Année exp.*',
                                        'attr' => array('class' => 'select form-control')))
                ;
    }
 
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\ServicePaiement'
        ));
    }
 
}