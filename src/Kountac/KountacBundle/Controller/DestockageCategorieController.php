<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Form\Taille_PoidsType;

class DestockageCategorieController extends Controller
{
    public function femmesAction()
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
        
        $categoriesHautsFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesHautsChildren();
        $categoriesBasFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesBasChildren();
        $categoriesEnsemblesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesEnsemblesChildren();
        $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesDestockage($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Femmes",
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
    
    public function femmesHautsAction()
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
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesHautsChildren();
        $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesDestockage($categoriesFemmes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Femmes ->> Hauts",
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
    
    public function femmesBasAction()
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
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesBasChildren();
        $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesDestockage($categoriesFemmes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Femmes ->> Bas",
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
    
    public function femmesEnsemblesAction()
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
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesEnsemblesChildren();
        $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesDestockage($categoriesFemmes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Femmes ->> Ensembles",
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
    
    public function hommesAction()
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
        
        $categoriesHautsHommes = $em->getRepository('KountacBundle:Categories')->getHommesHautsChildren();
        $categoriesBasHommes = $em->getRepository('KountacBundle:Categories')->getHommesBasChildren();
        $categoriesEnsemblesHommes = $em->getRepository('KountacBundle:Categories')->getHommesEnsemblesChildren();
        $produitsHommes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllHommesDestockage($categoriesHautsHommes,$categoriesBasHommes,$categoriesEnsemblesHommes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsHommes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Femmes",
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
    
    public function hommesHautsAction()
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
        
        $categoriesHommes = $em->getRepository('KountacBundle:Categories')->getHommesHautsChildren();
        $produitsHommes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesHommesDestockage($categoriesHommes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsHommes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Hommes ->> Hauts",
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
    
    public function hommesBasAction()
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
        
        $categoriesHommes = $em->getRepository('KountacBundle:Categories')->getHommesBasChildren();
        $produitsHommes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesHommesDestockage($categoriesHommes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsHommes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Hommes ->> Bas",
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
    
    public function hommesEnsemblesAction()
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
        
        $categoriesHommes = $em->getRepository('KountacBundle:Categories')->getHommesEnsemblesChildren();
        $produitsHommes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesDestockage($categoriesHommes); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsHommes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Hommes ->> Ensembles",
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
    
    public function enfantsAction()
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
        
        $categoriesHautsEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsHautsChildren();
        $categoriesBasEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsBasChildren();
        $categoriesEnsemblesEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsEnsemblesChildren();
        $produitsEnfants = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllEnfantsDestockage($categoriesHautsEnfants,$categoriesBasEnfants,$categoriesEnsemblesEnfants); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsEnfants,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Enfants",
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
    
    public function enfantsHautsAction()
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
        
        $categoriesEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsHautsChildren();
        $produitsEnfants = $em->getRepository('KountacBundle:Produits_2')->getCategoriesEnfantsDestockage($categoriesEnfants); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsEnfants,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Enfants ->> Hauts",
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
    
    public function enfantsBasAction()
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
        
        $categoriesEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsBasChildren();
        $produitsEnfants = $em->getRepository('KountacBundle:Produits_2')->getCategoriesEnfantsDestockage($categoriesEnfants); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsEnfants,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Enfants ->> Bas",
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
    
    public function enfantsEnsemblesAction()
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
        
        $categoriesEnfants = $em->getRepository('KountacBundle:Categories')->getEnfantsEnsemblesChildren();
        $produitsEnfants = $em->getRepository('KountacBundle:Produits_2')->getCategoriesEnfantsDestockage($categoriesEnfants); 
        
        $produits  = $this->get('knp_paginator')->paginate($produitsEnfants,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Déstockages Enfants ->> Ensembles",
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
