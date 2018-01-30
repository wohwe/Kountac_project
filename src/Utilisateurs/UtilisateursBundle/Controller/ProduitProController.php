<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Kountac\KountacBundle\Entity\Produits_1;
use Kountac\KountacBundle\Entity\Produits_2;
use Kountac\KountacBundle\Entity\Produits_3;
use Kountac\KountacBundle\Entity\Libelles_motif;
use Kountac\KountacBundle\Form\Produits_3Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Produit controller.
 *
 */
class ProduitProController extends Controller
{
    /**
     * Lists all produit entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsByMarque($user);
        
        $produits  = $this->get('knp_paginator')->paginate($listesProduits,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesProduits.html.twig', array(
            'produits' => $produits,
            'user' => $user,
        ));
    }
    
    /**
     * Creates a new produit entity.
     *
     */
    public function new1Action(Request $request)
    {
        $produit = new Produits_1();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\Produits_1Type', $produit);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                $produit->setMarque($user);
                $produit->setDateajout(new \DateTime('now'));
                $produit->setDateupdate(new \DateTime('now'));
                $produit->setPopularite(1); 
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Nouveau produit créé avec succès');
                return $this->redirectToRoute('produit_pro_new_2', array('id' => $produit->getId()));
            }
        }
        return $this->render('FOSUserBundle:Profile:Pro/addProduits_1Pro.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Creates a new produit entity.
     *
     */
    public function new2Action(Request $request, $id)
    {
        $produit = new Produits_2();
        $em = $this->getDoctrine()->getManager();
        $produit_1 = $em->getRepository('KountacBundle:Produits_1')->find($id);
        $libelles = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\Produits_2Type', $produit);
        $form->handleRequest($request);
        $form_motif = $this->createForm('Kountac\KountacBundle\Form\Libelles_motifType');
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                $produit->setProduit1($produit_1);
                
                $em->persist($produit);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Nouveau motif ajouté avec succès');
                return $this->redirectToRoute('produit_pro_new_3', array('id' => $produit->getId()));
            }
        }
        return $this->render('FOSUserBundle:Profile:Pro/addProduits_2Pro.html.twig', array(
            'produit' => $produit,
            'libelles' => $libelles,
            'produit_1' => $produit_1,
            'user' => $user,
            'form' => $form->createView(),
            'form_motif' => $form_motif->createView(),
        ));
    }

    /**
     * Creates a new produit entity.
     *
     */
    public function new3Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $produit_1 = $em->getRepository('KountacBundle:Produits_1')->find($produit_2->getProduit1()->getId());
        $user = $this->getUser();
        
        if ($this->get('request')->getMethod() == 'POST') 
        {
            if ($this->getRequest()->request->get('stock_xs') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_xs = $this->getRequest()->request->get('stock_xs') ;
                $produit_1->setStock($stock + $stock_xs);
                $produit_2->setStock($produit_2->getStock() + $stock_xs);
                $produit->setStock($stock_xs);
                $produit->setTaille('XS');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_s') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_s = $this->getRequest()->request->get('stock_s') ;
                $produit_1->setStock($stock + $stock_s);
                $produit_2->setStock($produit_2->getStock() + $stock_s);
                $produit->setStock($stock_s);
                $produit->setTaille('S');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_l') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_l = $this->getRequest()->request->get('stock_l') ;
                $produit_1->setStock($stock + $stock_l);
                $produit_2->setStock($produit_2->getStock() + $stock_l);
                $produit->setStock($stock_l);
                $produit->setTaille('L');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_m') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_m = $this->getRequest()->request->get('stock_m') ;
                $produit_1->setStock($stock + $stock_m);
                $produit_2->setStock($produit_2->getStock() + $stock_m);
                $produit->setStock($stock_m);
                $produit->setTaille('M');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_xl') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_xl = $this->getRequest()->request->get('stock_xl') ;
                $produit_1->setStock($stock + $stock_xl);
                $produit_2->setStock($produit_2->getStock() + $stock_xl);
                $produit->setStock($stock_xl);
                $produit->setTaille('XL');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_xxl') != 0 ){
                $stock = $produit_1->getStock();
                $produit = new Produits_3();
                $stock_xxl = $this->getRequest()->request->get('stock_xxl') ;
                $produit_1->setStock($stock + $stock_xxl);
                $produit_2->setStock($produit_2->getStock() + $stock_xxl);
                $produit->setStock($stock_xxl);
                $produit->setTaille('XXL');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            $this->get('session')->getFlashBag()->add('success','Taille(s) et stock(s) ajouté(s) avec succès');
            return $this->redirectToRoute('produit_pro_new_2', array('id' => $produit_1->getId()));
        }
        return $this->render('FOSUserBundle:Profile:Pro/addProduits_3Pro.html.twig', array(
            'produit_2' => $produit_2,
            'user' => $user,
        ));
    }
    
    /**
     * Creates a new produit entity.
     *
     */
    public function newResumeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_1')->find($id);
        $user = $this->getUser();
        
        return $this->render('FOSUserBundle:Profile:Pro/addProduits_ResumePro.html.twig', array(
            'produit' => $produit,
            'user' => $user,
        ));
    }
    
    
    /**
     * Finds and displays a produit entity.
     *
     */
    public function showAction(Request $request, Produits_1 $produit)
    {
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddPriceCommandeType');
        $form_stock = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddStockType');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $prixCommande = $form["prixCommande"]->getData();
                $produit->getEuro()->setPrixCommande($prixCommande);
                $produit->setDateupdate(new \DateTime('now'));
                $em->persist($produit);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Le prix de la commande sur mesure a été ajouté avec succès');
                return $this->redirectToRoute('produit_pro_show', array('id' => $produit->getId()));
            }
        }
        return $this->render('FOSUserBundle:Profile:Pro/showProduitsPro.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'form' => $form->createView(),
            'form_stock' => $form_stock->createView(),
        ));
    }
    
    /**
     * Add prix commande cfa of a produit entity.
     *
     */
    public function addprixCommandeCfaAction(Request $request, Produits_1 $produit)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddPriceCommandeType');
        $form->handleRequest($request);
        $prixCommande = $form["prixCommande"]->getData();
        $produit->getCfa()->setPrixCommande($prixCommande);
        $produit->setDateupdate(new \DateTime('now'));
        $em->persist($produit);
        $em->flush();
                
        $this->get('session')->getFlashBag()->add('success','Le prix de la commande sur mesure a été ajouté avec succès');
        return $this->redirectToRoute('produit_pro_show', array('id' => $produit->getId()));
    }
    
     /**
     * Add stock of a produit entity.
     *
     */
    public function addStockAction(Request $request, Produits_1 $produit)
    {
        $em = $this->getDoctrine()->getManager();
        $form_stock = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddStockType');
        $form_stock->handleRequest($request);
        $stock = $form_stock["stock"]->getData();
        $produit->setStock($stock);
        $produit->setDateupdate(new \DateTime('now'));
        $em->persist($produit);
        $em->flush();
                
        $this->get('session')->getFlashBag()->add('success','Votre stock a été modifié avec succès');
        return $this->redirectToRoute('produit_pro_show', array('id' => $produit->getId()));
    }
    
    /**
     * Add stock of a produit entity.
     *
     */
    public function addMotifAction(Request $request, $id)
    {
        
        $lebelle = new Libelles_motif();
        $em = $this->getDoctrine()->getManager();
        $produit_1 = $em->getRepository('KountacBundle:Produits_1')->find($id);
        $form = $this->createForm('Kountac\KountacBundle\Form\Libelles_motifType', $lebelle);
        
        $form->handleRequest($request);
        //var_dump($form['file']->getData());die();
        $em->persist($lebelle);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Nouveau motif ajouté avec succès');
        return $this->redirectToRoute('produit_pro_new_2', array('id' => $produit_1->getId()));
    }

    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function edit_1Action(Request $request, Produits_1 $produit)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\Produits_1Type', $produit);
        $editForm->handleRequest($request);
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $produit->setDateupdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            
            $this->get('session')->getFlashBag()->add('success','les informations de base du produit ont été modifiées avec succès');
            return $this->redirectToRoute('produit_pro_edit_2', array('id' => $produit->getId()));        
        }

        return $this->render('FOSUserBundle:Profile:Pro/editProduits_1Pro.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'form' => $editForm->createView(),
        ));
    }
    
    
    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function edit_2Action(Produits_1 $produit1)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        $produits = $em->getRepository('KountacBundle:Produits_2')->getProduct_2($produit1);
        
        return $this->render('FOSUserBundle:Profile:Pro/editProduits_2Pro.html.twig', array(
            'produit1' => $produit1,
            'produits' => $produits,
            'user' => $user,
        ));
    }

    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function edit_21Action(Request $request, Produits_2 $produit2)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $libelles = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        
        $editForm = $this->createForm('Kountac\KountacBundle\Form\Produits_Edit_2Type', $produit2);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->persist($produit2);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Le motif a été modifié avec succès');
            return $this->redirectToRoute('produit_pro_edit_3', array('id' => $produit2->getId()));
        }
        
        return $this->render('FOSUserBundle:Profile:Pro/editProduits_21Pro.html.twig', array(
            'produit2' => $produit2,
            'libelles' => $libelles,
            'user' => $user,
            'form' => $editForm->createView(),
        ));
    }
    
    
    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function edit_3Action(Produits_2 $produit2)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->getProduct_3($produit2);
        
        return $this->render('FOSUserBundle:Profile:Pro/editProduits_3Pro.html.twig', array(
            'produit2' => $produit2,
            'produits' => $produits,
            'user' => $user,
        ));
    }
    
        /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function edit_31Action(Request $request, Produits_3 $produit3)
    {
        $user = $this->getUser();
        
        $editForm = $this->createForm(Produits_3Type::class, $produit3);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit3);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','La taille et le stock associé ont été modifiés avec succès');
            return $this->redirectToRoute('produit_pro_edit_2', array('id' => $produit3->getProduit2()->getProduit1()->getId()));
        }
        
        return $this->render('FOSUserBundle:Profile:Pro/editProduits_31Pro.html.twig', array(
            'produit3' => $produit3,
            'user' => $user,
            'form' => $editForm->createView(),
        ));
    }
    
    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_1')->find($id);
        
        $em->remove($produit);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Produit supprimé avec succès');
       
        return $this->redirectToRoute('produit_pro_index');
    }
    
    /**
     * Lists all produit out of stocks.
     *
     */
    public function stockAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsByStock($user);
        $produits  = $this->get('knp_paginator')->paginate($listesProduits,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesProduits.html.twig', array(
            'produits' => $produits,
            'user' => $user
        ));
    }
    
    /**
     * Lists all produits sales.
     *
     */
    public function saleAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesProduits = $em->getRepository('KountacBundle:Produits_1')->getProduitsBySales($user);
        $produits  = $this->get('knp_paginator')->paginate($listesProduits,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesProduits.html.twig', array(
            'produits' => $produits,
            'user' => $user
        ));
    }

}
