<?php

namespace Kountac\KountacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Kountac\KountacBundle\Form\Media_Edit_motifType;

class Produits_Edit_2Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('libelle','entity', array('class' => 'KountacBundle:Libelles_motif',
                                             'label'=> 'Choisir un motif', 
                                             'attr' => array('class' => 'select form-control'),
                                             ))
                ->add('mannequin','entity', array('class' => 'KountacBundle:Mannequin',
                                             'label'=> 'Choisir un mannequin', 
                                             'attr' => array('class' => 'select form-control'),
                                             ))
                
                ->add('etat','choice',array('choices' => array('0' => 'Occasion',
                                                           '1' => 'Neuf'),
                                            'label' => 'Etat du produit*',
                                            'required' => true,
                                            'attr' => array('class' => 'select form-control')))
                ->add('picture', new Media_Edit_motifType())
                ->add('reduction','choice',array('choices' => array('0' => 'Non',
                                                                    '5' => '05 %',
                                                                   '10' => '10 %',
                                                                   '15' => '15 %',
                                                                   '20' => '20 %',
                                                                   '25' => '25 %',
                                                                   '30' => '30 %',
                                                                   '35' => '35 %',
                                                                   '40' => '40 %',
                                                                   '45' => '45 %',
                                                                   '50' => '50 %',
                                                                   '55' => '55 %',
                                                                   '60' => '60 %',
                                                                   '65' => '65 %',
                                                                   '70' => '70 %',
                                                                   '75' => '75 %'),
                                                'label' => 'Choisir taux de réduction',
                                                'required' => true,
                                                'attr' => array('class' => 'select form-control')))
                // Prix France
                ->add('europrix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal (€)',
                                           'required' => false))
                ->add('europrixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure (€)',
                                           'required' => false))
                
                // Prix en Allemagne
                ->add('allprix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal (€)',
                                           'required' => false))
                ->add('allprixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure (€)',
                                           'required' => false))
                
                // Prix Cameroun
                ->add('cfaprix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal (F CFA)',
                                           'required' => false))
                ->add('cfaprixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure (F CFA)',
                                           'required' => false))
               // Prix Nigéria
                ->add('nairaprix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal (₦)',
                                           'required' => false))
                ->add('nairaprixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure (₦)',
                                           'required' => false))
                // Prix en Etats-unis d'amérique
                ->add('usaprix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal ($)',
                                           'required' => false))
                ->add('usaprixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure ($)',
                                           'required' => false))
                // Prix en Livre
                ->add('livreprix','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix normal (£)',
                                           'required' => false))
                ->add('livreprixCommande','text', array('attr' => array('class' => 'input form-control'),
                                           'label' => 'Prix pour une commande sur mesure (£)',
                                           'required' => false))
                 ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kountac\KountacBundle\Entity\Produits_2'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kountac_kountacbundle_produits_2';
    }


}
