<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\CommentairesBundle\Entity\Commentaires;
use Kountac\KountacBundle\Form\RechercheType;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function allProductsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        
        $TousProduits = $em->getRepository('KountacBundle:Produits_2')->findAll();
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
        $marques = $em->getRepository('UtilisateursBundle:Utilisateurs')->getAllMarques();
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
            
            if ($this->getRequest()->request->get('categorie') != "toutes_les_categories" ){
                $categorieNom = $this->getRequest()->request->get('categorie');
                $categorie = $em->getRepository('KountacBundle:Categories')->findBy(array('nom' => $categorieNom));
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
                //var_dump($categorie); var_dump($prix); var_dump($taille); die();
            }
                        
            if ($categorie == null){
                if ($marque == null){
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->findAll();
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T1($prix); 
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
             
            $produits_resultat  = $this->get('knp_paginator')->paginate($ProduitsTries,$this->get('request')->query->get('page', 1),24);
            
            if (!$session->has('tri'))
                $session->set('tri', '1');
        
            return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits_resultat,
                                                                                            'categories' => $categories,
                                                                                            'marques' => $marques,
                                                                                            'motifs' => $motifs,
                                                                                            'tri' => $session->get('tri'),
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
        }
       
        return $this->render('KountacBundle:Default:produits/all_products.html.twig', array('produits' => $produits,
                                                                                            'marques' => $marques,
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
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
        
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $marque_id = $produit_2->getProduit1()->getMarque();
        $TousProduits = $em->getRepository('KountacBundle:Produits_2')->getProduitByMarque($marque_id);
        $categories = $em->getRepository('KountacBundle:Categories')->findAll();
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
            
            if ($this->getRequest()->request->get('categorie') != "toutes_les_categories" ){
                $categorieNom = $this->getRequest()->request->get('categorie');
                $categorie = $em->getRepository('KountacBundle:Categories')->findBy(array('nom' => $categorieNom));
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
                //var_dump($categorie); var_dump($prix); var_dump($taille); die();
            }
                        
            if ($categorie == null){
                    if ($taille == null){
                        if ($motif == null){
                            if ($prix == null){
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->findAll();
                            }else{
                                $ProduitsTries = $em->getRepository('KountacBundle:Produits_2')->getProductByTri_T1($prix); 
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
                                                                                            'tri' => $session->get('tri'),
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
        }
       
        return $this->render('KountacBundle:Default:produits/marque_espaces.html.twig', array('produits' => $produits,'produit2' => $produit_2,
                                                                                            'motifs' => $motifs,
                                                                                            'categories' => $categories,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                            ));
    }
    
    public function productAction(Request $request, $id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $marque = $produit->getProduit1()->getMarque();
	$categorie = $produit->getProduit1()->getCategorie();
        $categorieProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsByCategorie($categorie, $id);
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
        
        /*recuperation de l'id de la marque*/
        
        return $this->render('KountacBundle:Default:produits/single_product.html.twig', array(  'produit' => $produit,
                                                                                                'commentaires' => $commentaires,
                                                                                                'commentaire' => $commentaire,
                                                                                                'form' => $form->createView(),
                                                                                                'categorieProduits' => $categorieProduits,
                                                                                                'panier '=> $panier,
                                                                                                'souhait' => $souhait,
                                                                                                'compare' => $compare,
                                                                                                'marque' => $marque,
                                                                                                'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa')
                                                                                              ));
    }
    
   
    
    public function categorie_3Action($categorie)
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->byCategorie_3($categorie);
        $nomCategorie = $em->getRepository('KountacBundle:Categories')->find($categorie)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCategorie,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/categorie.html.twig', array('produits' => $produits,
                                                                                         'nom' => $nomCategorie,
                                                                                         'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function categorie_2Action($categorie)
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->byCategorie_2($categorie);
        $nomCategorie = $em->getRepository('KountacBundle:Categories')->find($categorie)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCategorie,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/categorie.html.twig', array('produits' => $produits,
                                                                                         'nom' => $nomCategorie,
                                                                                         'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function categorie_1Action($categorie)
    {
        $session = $this->getRequest()->getSession();
        $session->set('categorie', '1');
        $session->remove('collection');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->byCategorie_1($categorie);
        $nomCategorie = $em->getRepository('KountacBundle:Categories')->find($categorie)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCategorie,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/categorie.html.twig', array('produits' => $produits,
                                                                                         'nom' => $nomCategorie,
                                                                                         'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'categorie' => $session->get('categorie')));
    }
    
    public function collectionAction($collection)
    {
        $session = $this->getRequest()->getSession();
        $session->set('collection', '1');
        $session->remove('categorie');
        $session->remove('recherche');
        
        $em = $this->getDoctrine()->getManager();
        
        $produitsCollection = $em->getRepository('KountacBundle:Produits_2')->byCollection($collection);
        $nomCollection = $em->getRepository('KountacBundle:Collections')->find($collection)->getNom();
        $produits  = $this->get('knp_paginator')->paginate($produitsCollection,$this->get('request')->query->get('page', 1),20);

        return $this->render('KountacBundle:Default:produits/categorie.html.twig', array('produits' => $produits,
                                                                                            'nom' => $nomCollection,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                         'collection' => $session->get('collection')));
    }
    
    public function rechercheAction()
    {
        $form = $this->createForm(new RechercheType());
        
        return $this->render('KountacBundle:Menu:recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheMobileAction()
    {
        $form = $this->createForm(new RechercheType());
        
        return $this->render('KountacBundle:Menu:rechercheMobile.html.twig', array('form' => $form->createView()));
    }


    public function rechercheTraitementAction() 
    {
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form = $this->createForm(new RechercheType());
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $produitsRecherche = $em->getRepository('KountacBundle:Produits_2')->recherche($form['recherche']->getData());
            $produits  = $this->get('knp_paginator')->paginate($produitsRecherche,$this->get('request')->query->get('page', 1),20);
            $mot = $form['recherche']->getData();
        } else {
            throw $this->createNotFoundException('La page n\'exixte pas');
        }
        
        $session = $this->getRequest()->getSession();
        $session->set('recherche', '1');
        $session->remove('categorie');
        $session->remove('collection');
        return $this->render('KountacBundle:Default:produits/categorie.html.twig', array(
            'produits' => $produits, 
            'mot' => $mot, 
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa'),
            'recherche' => $session->get('recherche')));
    }
    
    public function quickVueAction($id)
    {    
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        return $this->render('KountacBundle:Default:produits/quickView.html.twig', array('produit' => $produit,
                                                                                         'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
    public function quickViewAllProductsAction($id)
    {    
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        return $this->render('KountacBundle:Default:produits/quickViewAll.html.twig', array('produit' => $produit,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
    public function quickViewEspaceMarqueAction($id)
    {    
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        return $this->render('KountacBundle:Default:produits/quickViewMarque.html.twig', array('produit' => $produit,
                                                                                            'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                            'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                            'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                            'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                            'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }
    
}
