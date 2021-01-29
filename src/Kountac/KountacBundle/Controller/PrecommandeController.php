<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Form\Taille_PoidsType;

class PrecommandeController extends Controller
{
    public function precommandesAction($precommande)
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        $em = $this->getDoctrine()->getManager();
        $precommande = $em->getRepository('KountacBundle:Precommandes')->find($precommande)->getNom();  
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        if ($session->has('euro')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesEuro($precommande);
        }
        if ($session->has('all')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesAll($precommande);
        }
        if ($session->has('livre')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesLivre($precommande);
        }
        if ($session->has('usa')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesUsa($precommande);
        }
        if ($session->has('cfa')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesCfa($precommande);
        }
        if ($session->has('naira')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byPrecommandesNaira($precommande);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsPrecommandes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Précommande(s) ".$precommande,
                                                                                            'marques' => $marques, 
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function newAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        if ($session->has('euro')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byNewPrecommandesEuro();
        }
        if ($session->has('all')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byNewPrecommandesAll();
        }
        if ($session->has('livre')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byNewPrecommandesLivre();
        }
        if ($session->has('cfa')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byNewPrecommandesCfa();
        }
        if ($session->has('naira')){
            $produitsPrecommandes = $em->getRepository('KountacBundle:Produits_2')->byNewPrecommandesNaira();
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsPrecommandes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Nouveautés précommande",
                                                                                            'marques' => $marques, 
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
}
