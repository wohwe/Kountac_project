<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Form\Taille_PoidsType;

class SurMesuresCategorieController extends Controller
{
    public function femmesAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();       
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();  
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesHautsFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesHautsChildren();
        $categoriesBasFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesBasChildren();
        $categoriesEnsemblesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesEnsemblesChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureEuro($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureAll($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureLivre($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureCfa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureUsa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureNaira($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Femmes",
                                                                                            'marques' => $marques, 
                                                                                            'images' => $images,
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesHautsChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Femmes ->> Hauts",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images, 
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesBasChildren();
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Femmes ->> Bas",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getFemmesEnsemblesChildren();
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Femmes ->> Ensembles",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesHautsFemmes = $em->getRepository('KountacBundle:Categories')->getHommesHautsChildren();
        $categoriesBasFemmes = $em->getRepository('KountacBundle:Categories')->getHommesBasChildren();
        $categoriesEnsemblesFemmes = $em->getRepository('KountacBundle:Categories')->getHommesEnsemblesChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureEuro($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureAll($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureLivre($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureCfa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureUsa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureNaira($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Hommes",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getHommesHautsChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Hommes ->> Hauts",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getHommesBasChildren();
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Hommes ->> Bas",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getHommesEnsemblesChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Hommes ->> Ensembles",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesHautsFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsHautsChildren();
        $categoriesBasFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsBasChildren();
        $categoriesEnsemblesFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsEnsemblesChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureEuro($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureAll($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureLivre($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureCfa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureUsa($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesAllFemmesSurMesureNaira($categoriesHautsFemmes,$categoriesBasFemmes,$categoriesEnsemblesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Enfants",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsHautsChildren();
        
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Enfants ->> Hauts",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsBasChildren();
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Enfants ->> Bas",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll(); 
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $categoriesFemmes = $em->getRepository('KountacBundle:Categories')->getEnfantsEnsemblesChildren();
        if ($session->has('euro')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureEuro($categoriesFemmes);
        }
        elseif ($session->has('all')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureAll($categoriesFemmes);
        }
        elseif ($session->has('livre')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureLivre($categoriesFemmes);
        }
        elseif ($session->has('cfa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureCfa($categoriesFemmes);
        }
        elseif ($session->has('usa')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureUsa($categoriesFemmes);
        }
        elseif ($session->has('naira')){
            $produitsFemmes = $em->getRepository('KountacBundle:Produits_2')->getCategoriesFemmesSurMesureNaira($categoriesFemmes);
        }
        
        $produits  = $this->get('knp_paginator')->paginate($produitsFemmes,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => "Sur mesure Enfants ->> Ensembles",
                                                                                            'marques' => $marques,
                                                                                            'images' => $images,  
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
