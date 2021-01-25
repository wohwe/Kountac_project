<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\CommentairesBundle\Entity\Commentaires;
use Kountac\KountacBundle\Form\RechercheType;
use Kountac\KountacBundle\Form\Taille_PoidsType;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function allProductsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        
        $TousProduits = $em->getRepository('KountacBundle:Produits_2')->getAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $produits  = $this->get('knp_paginator')->paginate($TousProduits,$this->get('request')->query->get('pages', 1),21);
        $minPrix = "";
        $maxPrix = "";

        if ($session->has('tri'))
            $session->remove('tri');
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            if ($this->getRequest()->request->get('prix') != null ){
                $prix = $this->getRequest()->request->get('prix') ;
                $prix = explode(" - ",$prix);

                $minPrix = str_replace(",", "", $prix[0]);
                $maxPrix = str_replace(",", "", $prix[1]);;
            }
            else {
                $prix = null;
            }

            if ($this->getRequest()->request->get('categorie') != "toutes_les_categories" ){
                $categorieNom = $this->getRequest()->request->get('categorie');
                $categorie = $em->getRepository('KountacBundle:Categories')->findBy(array('id' => $categorieNom));
            }
            else {
                $categorie = null;
            }
            
            if ($this->getRequest()->request->get('marque') != "toutes_les_marques" ){
                $MarqueNom = $this->getRequest()->request->get('marque');
                $marque = $em->getRepository('UtilisateursBundle:Utilisateurs')->findBy(array('marque' => $MarqueNom));
            }
            else {
                $marque = null;
            }
            
            if ($this->getRequest()->request->get('motif') != "toutes_les_motifs" ){
                $motifLibelle = $this->getRequest()->request->get('motif');
                $motif = $em->getRepository('KountacBundle:Libelles_motif')->findBy(array('id' => $motifLibelle));
            }
            else {
                $motif = null;
            }
            
            if ($this->getRequest()->request->get('taille') != "toutes_les_tailles" ){
                $taille = $this->getRequest()->request->get('taille') ;
            }
            else {
                $taille = null;
                //var_dump($categorie); var_dump($prix); var_dump($taille); die();
            }
                        
            if ($categorie == null){
                if ($marque == null){
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->findAll();
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T1($minPrix, $maxPrix, $devise);
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T2($motif);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T3($prix, $motif); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T4($taille);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T5($prix, $taille); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T6($motif, $taille);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T7($prix, $motif, $taille); 
                            }
                        }
                    }     
                }
                else{
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T8($marque);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T9($prix, $marque); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T10($motif, $marque);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T11($prix, $motif, $marque); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T12($taille, $marque);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T13($prix, $taille, $marque); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T14($motif, $taille, $marque);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T15($prix, $motif, $taille, $marque); 
                            }
                        }
                    }
                }
            }
            else {
                if ($marque == null){
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T16($categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T17($prix, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T18($motif, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T19($prix, $motif, $categorie); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T20($taille, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T21($prix, $taille, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T22($motif, $taille, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T23($prix, $motif, $taille, $categorie); 
                            }
                        }
                    }     
                }
                else{
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T24($marque, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T25($prix, $marque, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T26($motif, $marque, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T27($prix, $motif, $marque, $categorie); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T28($taille, $marque, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T29($prix, $taille, $marque, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T30($motif, $taille, $marque, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri($prix, $motif, $taille, $marque, $categorie); 
                            }
                        }
                    }
                }
            }
             
            $produits_resultat  = $this->get('knp_paginator')->paginate($ProduitsTries,$this->get('request')->query->get('page', 1),21);
            
            if (!$session->has('tri'))
                $session->set('tri', '1');
        
            return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits_resultat,
                'cfaprix' => $cfaprix,
                'europrix' => $europrix,
                'usaprix' => $usaprix,
                'livreprix' => $livreprix,
                'nairaprix' => $nairaprix,
                'allprix' => $allprix,
                'minPrix' => $minPrix,
                'maxPrix' => $maxPrix,
                                                                                            'categories' => $categories,
                                                                                            'marques' => $marques,
                                                                                            'mannequins' => $mannequins,
                                                                                            'images' => $images,
                                                                                            'motifs' => $motifs,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'tri' => $session->get('tri'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                            
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
        }
       
        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'cfaprix' => $cfaprix,
                                                                                            'europrix' => $europrix,
                                                                                            'usaprix' => $usaprix,
                                                                                            'livreprix' => $livreprix,
                                                                                            'nairaprix' => $nairaprix,
                                                                                            'allprix' => $allprix,
                                                                                            'marques' => $marques,
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'images' => $images,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
    
    public function espace_marqueAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        if (!$produit_2) {
            return $this->redirectToRoute('homepage');
        }
        $marque_id = $produit_2->getProduit1()->getMarque();
        $TousProduits = $em->getRepository('KountacBundle:Produits_2')->getProduitByMarque($marque_id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $produits  = $this->get('knp_paginator')->paginate($TousProduits,$this->get('request')->query->get('page', 1),20);
       
        if ($session->has('tri'))
            $session->remove('tri');
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            if ($this->getRequest()->request->get('prix') != null ){
                $prix = $this->getRequest()->request->get('prix') ;
            }
            else {
                $prix = null;
            }

            $prix = explode(" - ",$prix);

            $minPrix = str_replace(",", "", $prix[0]);
            $maxPrix = str_replace(",", "", $prix[1]);;

            if ($this->getRequest()->request->get('categorie') != "toutes_les_categories" ){
                $categorieNom = $this->getRequest()->request->get('categorie');
                $categorie = $em->getRepository('KountacBundle:Categories')->findBy(array('id' => $categorieNom));
            }
            else {
                $categorie = null;
            }
            
            if ($this->getRequest()->request->get('motif') != "toutes_les_motifs" ){
                $motifLibelle = $this->getRequest()->request->get('motif');
                $motif = $em->getRepository('KountacBundle:Libelles_motif')->findBy(array('libelle' => $motifLibelle));
               // var_dump($motif); die();
            }
            else {
                $motif = null;
            }
            
            if ($this->getRequest()->request->get('taille') != "toutes_les_tailles" ){
                $taille = $this->getRequest()->request->get('taille') ;
            }
            else {
                $taille = null;
            }
            
            if ($categorie == null){
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->findAll();
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T1($minPrix, $maxPrix, $devise); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T2($motif);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T3($prix, $motif); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T4($taille);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T5($prix, $taille); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T6($motif, $taille);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T7($prix, $motif, $taille); 
                            }
                        }
                    }     
            }
            else {
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T16($categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T17($prix, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T18($motif, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T19($prix, $motif, $categorie); 
                            }
                        }
                    } else{
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T20($taille, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T21($prix, $taille, $categorie); 
                            }
                        }else{
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T22($motif, $taille, $categorie);
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T23($prix, $motif, $taille, $categorie); 
                            }
                        }
                    }     
            }
             
            $produits_resultat  = $this->get('knp_paginator')->paginate($ProduitsTries,$this->get('request')->query->get('page', 1),24);
            
            if (!$session->has('tri'))
                $session->set('tri', '1');
        
            return $this->render('KountacBundle:Default:produits/marque_espaces.html.twig', array('produits' => $produits_resultat,
                                                                                            'categories' => $categories,'produit2' => $produit_2,
                                                                                            'motifs' => $motifs,
                                                                                            'cfaprix' => $cfaprix,
                                                                                            'europrix' => $europrix,
                                                                                            'usaprix' => $usaprix,
                                                                                            'livreprix' => $livreprix,
                                                                                            'nairaprix' => $nairaprix,
                                                                                            'allprix' => $allprix,
                                                                                            'images' => $images,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'mannequins' => $mannequins,
                                                                                            'tri' => $session->get('tri'),
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                            
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
        }
       
        return $this->render('KountacBundle:Default:produits/marque_espaces.html.twig', array('produits' => $produits,'produit2' => $produit_2,
                                                                                            'motifs' => $motifs,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'mannequins' => $mannequins,
                                                                                            'images' => $images,
                                                                                            'categories' => $categories,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }

    public function espace_marque_allAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        if (!$produit_2) {
            return $this->redirectToRoute('homepage');
        }
        $marque_id = $produit_2->getProduit1()->getMarque();
        $TousProduits = $em->getRepository('KountacBundle:Produits_2')->getProduitByMarque($marque_id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $produits  = $this->get('knp_paginator')->paginate($TousProduits,$this->get('request')->query->get('page', 1),20);

        if ($session->has('tri'))
            $session->remove('tri');

        if ($this->get('request')->getMethod() == 'POST')
        {
            if ($this->getRequest()->request->get('prix') != null ){
                $prix = $this->getRequest()->request->get('prix') ;
            }
            else {
                $prix = null;
            }

            $prix = explode(" - ",$prix);

            $minPrix = str_replace(",", "", $prix[0]);
            $maxPrix = str_replace(",", "", $prix[1]);;

            if ($this->getRequest()->request->get('categorie') != "toutes_les_categories" ){
                $categorieNom = $this->getRequest()->request->get('categorie');
                $categorie = $em->getRepository('KountacBundle:Categories')->findBy(array('id' => $categorieNom));
            }
            else {
                $categorie = null;
            }

            if ($this->getRequest()->request->get('motif') != "toutes_les_motifs" ){
                $motifLibelle = $this->getRequest()->request->get('motif');
                $motif = $em->getRepository('KountacBundle:Libelles_motif')->findBy(array('libelle' => $motifLibelle));
                // var_dump($motif); die();
            }
            else {
                $motif = null;
            }

            if ($this->getRequest()->request->get('taille') != "toutes_les_tailles" ){
                $taille = $this->getRequest()->request->get('taille') ;
            }
            else {
                $taille = null;
            }

            if ($categorie == null){
                if ($taille == null){
                    if ($motif == null){
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->findAll();
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T1($minPrix, $maxPrix, $devise);
                        }
                    }else{
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T2($motif);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T3($prix, $motif);
                        }
                    }
                } else{
                    if ($motif == null){
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T4($taille);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T5($prix, $taille);
                        }
                    }else{
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T6($motif, $taille);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T7($prix, $motif, $taille);
                        }
                    }
                }
            }
            else {
                if ($taille == null){
                    if ($motif == null){
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T16($categorie);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T17($prix, $categorie);
                        }
                    }else{
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T18($motif, $categorie);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T19($prix, $motif, $categorie);
                        }
                    }
                } else{
                    if ($motif == null){
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T20($taille, $categorie);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T21($prix, $taille, $categorie);
                        }
                    }else{
                        if ($prix == null){
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T22($motif, $taille, $categorie);
                        }else{
                            $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T23($prix, $motif, $taille, $categorie);
                        }
                    }
                }
            }

            $produits_resultat  = $this->get('knp_paginator')->paginate($ProduitsTries,$this->get('request')->query->get('page', 1),24);

            if (!$session->has('tri'))
                $session->set('tri', '1');

            return $this->render('KountacBundle:Default:produits/marque_espaces.html.twig', array('produits' => $produits_resultat,
                'categories' => $categories,'produit2' => $produit_2,
                'motifs' => $motifs,
                'cfaprix' => $cfaprix,
                'europrix' => $europrix,
                'usaprix' => $usaprix,
                'livreprix' => $livreprix,
                'nairaprix' => $nairaprix,
                'allprix' => $allprix,
                'images' => $images,
                'form' => $form_taillePoids->createView(),
                'mannequins' => $mannequins,
                'tri' => $session->get('tri'),
                'euro' => $this->getRequest()->getSession()->get('euro'),
                'all' => $this->getRequest()->getSession()->get('all'),
                'livre' => $this->getRequest()->getSession()->get('livre'),
                'usa' => $this->getRequest()->getSession()->get('usa'),
                'naira' => $this->getRequest()->getSession()->get('naira'),
                'cfa' => $this->getRequest()->getSession()->get('cfa'),
            ));
        }

        return $this->render('KountacBundle:Default:produits/marque_espaces.html.twig', array('produits' => $produits,'produit2' => $produit_2,
            'motifs' => $motifs,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
            'form' => $form_taillePoids->createView(),
            'mannequins' => $mannequins,
            'images' => $images,
            'categories' => $categories,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'all' => $this->getRequest()->getSession()->get('all'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa'),
        ));
    }
	
    
    public function productAction(Request $request, $id)
    {
        $session = $this->getRequest()->getSession();
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        if (!$produit) {
            return $this->redirectToRoute('homepage');
        }
        $images = $em->getRepository('KountacBundle:Media_motif')->findImagesTops($produit);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $images_all = $em->getRepository('KountacBundle:Media_motif')->findAll();

        $images_autres = $em->getRepository('KountacBundle:Media_motif')->findImagesAutres($produit);
        $marque = $produit->getProduit1()->getMarque();
	    $categorie = $produit->getProduit1()->getCategorie();
        $categorieProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsByCategorie($categorie, $id);
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $commentaires = $em->getRepository('CommentairesBundle:Commentaires')->commentairesProduit($id);
        $commentaire = new Commentaires();
        $commentaire->setDate(new \DateTime('now'));
        $commentaire->setProduit($produit);
        $commentaire->setPseudo($this->getUser());
        
        $form = $this->createForm('Kountac\CommentairesBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                if ($this->getRequest()->request->get('note') != null)
                {
                    $note = $this->getRequest()->request->get('note');
                    $commentaire->setTitre($note);
                }
                $em->persist($commentaire);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success','Votre commentaire a été ajouté avec succès');
                
                return $this->redirectToRoute('product', array('id' => $produit->getId()));
            }
        }
             if (!$produit) 
            throw $this->createNotFoundException ('Aucun produit dans cette page');
            
        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        if ($session->has('souhait'))
            $souhait = $session->get('souhait');
        else
            $souhait = false;
        
        if ($session->has('compare'))
            $compare = $session->get('compare');
        else
            $compare = false;
        
        return $this->render('KountacBundle:Default:produits/single_product.html.twig', array(  'produit' => $produit,
                                                                                                'commentaires' => $commentaires,
                                                                                                'mannequins' => $mannequins,
                                                                                                'images' => $images,
                                                                                                'cfaprix' => $cfaprix,
                                                                                                'europrix' => $europrix,
                                                                                                'usaprix' => $usaprix,
                                                                                                'livreprix' => $livreprix,
                                                                                                'nairaprix' => $nairaprix,
                                                                                                'allprix' => $allprix,
                                                                                                'images_all' => $images_all,
                                                                                                'images_autres' => $images_autres,
                                                                                                'commentaire' => $commentaire,
                                                                                                'form' => $form->createView(),
                                                                                                'categorieProduits' => $categorieProduits,
                                                                                                'panier '=> $panier,
                                                                                                'souhait' => $souhait,
                                                                                                'compare' => $compare,
                                                                                                'marque' => $marque,
                                                                                                'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                                'all' => $this->getRequest()->getSession()->get('all'),                                                                                    
                                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa')
                                                                                              ));
                                                                                              
    }
	
    
    public function productMannequinAction(Request $request, $id, $id_image)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $image = $em->getRepository('KountacBundle:Media_motif')->find($id_image);
        $images_autres = $em->getRepository('KountacBundle:Media_motif')->findImagesAutresMannequins($produit, $image);
        $images = $em->getRepository('KountacBundle:Media_motif')->findImagesTops($produit);
        $images_all = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $marque = $produit->getProduit1()->getMarque();
	    $categorie = $produit->getProduit1()->getCategorie();
        $categorieProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsByCategorie($categorie, $id);
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $commentaires = $em->getRepository('CommentairesBundle:Commentaires')->commentairesProduit($id);
        $commentaire = new Commentaires();
        $commentaire->setDate(new \DateTime('now'));
        $commentaire->setProduit($produit);
        $commentaire->setPseudo($this->getUser());
        
        $form = $this->createForm('Kountac\CommentairesBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                if ($this->getRequest()->request->get('note') != null)
                {
                    $note = $this->getRequest()->request->get('note');
                    $commentaire->setTitre($note);
                }
                $em->persist($commentaire);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success','Votre commentaire a été ajouté avec succès');
                
                return $this->redirectToRoute('product', array('id' => $produit->getId()));
            }
        }
             if (!$produit) 
            throw $this->createNotFoundException ('Aucun produit dans cette page');
            
        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        if ($session->has('souhait'))
            $souhait = $session->get('souhait');
        else
            $souhait = false;
        
        if ($session->has('compare'))
            $compare = $session->get('compare');
        else
            $compare = false;
        
        return $this->render('KountacBundle:Default:produits/single_mannequin.html.twig', array(  'produit' => $produit,
                                                                                                'commentaires' => $commentaires,
                                                                                                'mannequins' => $mannequins,
                                                                                                'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                                'image' => $image,
                                                                                                'images_all' => $images_all,
                                                                                                'images_autres' => $images_autres,
                                                                                                'commentaire' => $commentaire,
                                                                                                'form' => $form->createView(),
                                                                                                'categorieProduits' => $categorieProduits,
                                                                                                'panier '=> $panier,
                                                                                                'souhait' => $souhait,
                                                                                                'compare' => $compare,
                                                                                                'marque' => $marque,
                                                                                                'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                                'all' => $this->getRequest()->getSession()->get('all'),                                                                                    
                                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa')
                                                                                              ));
    }
    
    public function categorie_2Action($categorie)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        $em = $this->getDoctrine()->getManager();
        
        if ($em->getRepository('KountacBundle:Categories')->find($categorie)->getParent() != NULL)
        {
            $nomParent = $em->getRepository('KountacBundle:Categories')->find($categorie)->getParent()->getNom();
        }
        
        
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->byCategorie_2($categorie);
        $nomCategorie = $em->getRepository('KountacBundle:Categories')->find($categorie)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCategorie,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => $nomCategorie,
                                                                                            'marques' => $marques,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'images' => $images,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function categorie_1Action($categorie)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $categories_enfants = $em->getRepository('KountacBundle:Categories')->find($categorie)->getChildren();
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->byCategorie_1($categorie, $categories_enfants);
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $nomCategorie = $em->getRepository('KountacBundle:Categories')->find($categorie)->getNom();
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
        $produits  = $this->get('knp_paginator')->paginate($produitsCategorie,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => $nomCategorie,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'marques' => $marques, 
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'images' => $images,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function collectionAction($collection)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $session->set('collection', '1');
        $session->remove('categorie');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $produitsCollection = $em->getRepository('KountacBundle:Produits_2')->byCollection($collection);
        $nomCollection = $em->getRepository('KountacBundle:Collections')->find($collection)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCollection,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => $nomCollection,
                                                                                            'marques' => $marques,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'motifs' => $motifs,
                                                                                            'images' => $images,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'collection' => $session->get('collection')));
    }
	
	public function lookAction($look)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $session->set('collection', '1');
        $session->remove('categorie');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        $produitsLooks = $em->getRepository('KountacBundle:Produits_2')->byIdeesLook($look);
        $nomIdeesLook = $em->getRepository('KountacBundle:Idees_looks')->find($look)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsLooks,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'nom' => $nomIdeesLook,
                                                                                            'marques' => $marques,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
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
                                                                                         'collection' => $session->get('collection')));
    }
    
    public function rechercheAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $form = $this->createForm(new RechercheType());
        
        return $this->render('KountacBundle:Menu:recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheMobileAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $form = $this->createForm(new RechercheType());
        
        return $this->render('KountacBundle:Menu:rechercheMobile.html.twig', array('form' => $form->createView()));
    }


    public function rechercheTraitementAction() 
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form = $this->createForm(new RechercheType());
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
            $categories = $em->getRepository('KountacBundle:Categories')->findAll();
            $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
            $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
            $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
            $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
            $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
            $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
            $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
            $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
            $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
            $form_taillePoids = $this->createForm(new Taille_PoidsType());                       
        
            $produitsRecherche = $em->getRepository('KountacBundle:Produits_2')->recherche($form['recherche']->getData());
            $produits  = $this->get('knp_paginator')->paginate($produitsRecherche,$this->get('request')->query->get('page', 1),20);
            $mot = $form['recherche']->getData();
            $session->set('motRecherche', $mot);
        } else {
            $em = $this->getDoctrine()->getManager();
            $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
            $categories = $em->getRepository('KountacBundle:Categories')->findAll();
            $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
            $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
            $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
            $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
            $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
            $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
            $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
            $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
            $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();  
            $form_taillePoids = $this->createForm(new Taille_PoidsType());  

            $mot = $session->get('motRecherche');
            $produitsRecherche = $em->getRepository('KountacBundle:Produits_2')->recherche($mot);
            $produits  = $this->get('knp_paginator')->paginate($produitsRecherche,$this->get('request')->query->get('page', 1),20);
        }
        
        $session = $this->getRequest()->getSession();
        $session->set('recherche', '1');
        $session->remove('categorie');
        $session->remove('collection');
        
        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array(
            'produits' => $produits, 
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
            'mot' => $mot, 
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
            'recherche' => $session->get('recherche')));
    }
    
    public function quickVueAction($id)
    {    
        $session = $this->getRequest()->getSession();
        include 'localisation.php';

        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        
        return $this->render('KountacBundle:Default:produits/quickView.html.twig', array('produit' => $produit,
                                                                                         'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
    public function quickViewAllProductsAction($id)
    {    
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        
        return $this->render('KountacBundle:Default:produits/quickViewAll.html.twig', array('produit' => $produit,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
    public function quickViewEspaceMarqueAction($id)
    {    
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        
        return $this->render('KountacBundle:Default:produits/quickViewMarque.html.twig', array('produit' => $produit,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
    public function recherche_avatarAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            if ($this->getRequest()->request->get('mannequin') != "tous_les_mannequins" ){
                
                $mannequin = $this->getRequest()->request->get('mannequin');
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->findAvatar($mannequin);
            }
            else {
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->findAll();
            }
            if ($this->getRequest()->request->get('mannequin') == null ){
                
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->findAll();
            }
        }
        
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $produits  = $this->get('knp_paginator')->paginate($imagesMannequins,$this->get('request')->query->get('page', 1),20);
       
        
        $this->get('session')->getFlashBag()->add('success','Résultat de la recherche par avatar');
        return $this->render('KountacBundle:Default:produits/all_productsResultats.html.twig', array('produits' => $produits,
                                                                                            'marques' => $marques,
                                                                                            'motifs' => $motifs,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'categories' => $categories,
                                                                                            'images' => $images,
                                                                                            'mannequins' => $mannequins,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
    
    public function recherche_avatarMarqueAction($id)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $marque_id = $produit_2->getProduit1()->getMarque();
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            if ($this->getRequest()->request->get('mannequin') != "tous_les_mannequins" ){
                
                $mannequin = $this->getRequest()->request->get('mannequin');
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->findAvatarByMarque($mannequin,$marque_id);
            }
            else {
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->getProduitByMarqueResult($marque_id);
            }
            if ($this->getRequest()->request->get('mannequin') == null ){
                
                $imagesMannequins = $em->getRepository('KountacBundle:Media_motif')->getProduitByMarqueResult($marque_id);
            }
        }
        
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        $form_taillePoids = $this->createForm(new Taille_PoidsType());
        $images  = $this->get('knp_paginator')->paginate($imagesMannequins,$this->get('request')->query->get('page', 1),20);
       
        
        $this->get('session')->getFlashBag()->add('success','Résultat de la recherche par avatar');
        return $this->render('KountacBundle:Default:produits/marque_espacesResultats.html.twig', array('categories' => $categories,'produit2' => $produit_2,
                                                                                            'motifs' => $motifs,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'mannequins' => $mannequins,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
    
    
    public function recherche_taillePoidsAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form_taillePoids = $this->createForm(new Taille_PoidsType());
            $form_taillePoids->bind($this->get('request'));
            $taille = $form_taillePoids['taille']->getData();
            $poids = $form_taillePoids['poids']->getData();
            $poids_min = $poids - 8; $poids_max = $poids + 8;
            $taille_min = $taille - 0.08; $taille_max = $taille + 0.08;
            $images_mannequins = $em->getRepository('KountacBundle:Media_motif')->triTaillePoids($poids_min, $poids_max, $taille_min, $taille_max);
            $produits  = $this->get('knp_paginator')->paginate($images_mannequins,$this->get('request')->query->get('page', 1),20);
        } else {
            throw $this->createNotFoundException('La page n\'exixte pas');
        }
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        
        $this->get('session')->getFlashBag()->add('success','Résultat de la recherche par taille et poids');
        return $this->render('KountacBundle:Default:produits/all_productsResultats.html.twig', array('produits' => $produits,
                                                                                            'marques' => $marques,
                                                                                            'motifs' => $motifs,
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'categories' => $categories,
                                                                                            'mannequins' => $mannequins,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
    
    public function recherche_taillePoidsMarqueAction($id)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $marque_id = $produit_2->getProduit1()->getMarque();
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form_taillePoids = $this->createForm(new Taille_PoidsType());
            $form_taillePoids->bind($this->get('request'));
            $taille = $form_taillePoids['taille']->getData();
            $poids = $form_taillePoids['poids']->getData();
            $poids_min = $poids - 8; $poids_max = $poids + 8;
            $taille_min = $taille - 0.08; $taille_max = $taille + 0.08;
            $images_mannequins = $em->getRepository('KountacBundle:Media_motif')->triTaillePoidsByMarque($poids_min, $poids_max, $taille_min, $taille_max, $marque_id);
            $images  = $this->get('knp_paginator')->paginate($images_mannequins,$this->get('request')->query->get('page', 1),20);
        } 
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();
        $motifs = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $europrix = $em->getRepository('KountacBundle:Produits_2')->getPrixEuro();
        $cfaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixCFA();
        $usaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixUSA();
        $livreprix = $em->getRepository('KountacBundle:Produits_2')->getPrixLivre();
        $nairaprix = $em->getRepository('KountacBundle:Produits_2')->getPrixNaira();
        $allprix = $em->getRepository('KountacBundle:Produits_2')->getPrixAll();
        
        $this->get('session')->getFlashBag()->add('success','Résultat de la recherche par taille et poids');
        return $this->render('KountacBundle:Default:produits/marque_espacesResultats.html.twig', array('categories' => $categories,'produit2' => $produit_2,
                                                                                            'motifs' => $motifs,
                                                                                            'form' => $form_taillePoids->createView(),
                                                                                            'images' => $images,
            'cfaprix' => $cfaprix,
            'europrix' => $europrix,
            'usaprix' => $usaprix,
            'livreprix' => $livreprix,
            'nairaprix' => $nairaprix,
            'allprix' => $allprix,
                                                                                            'mannequins' => $mannequins,
                                                                                            'tri' => $this->getRequest()->getSession()->get('tri'),
                                                                                            'all' => $this->getRequest()->getSession()->get('all'),                                                                                
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
}
