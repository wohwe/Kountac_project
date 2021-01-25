<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\Produits_1;
use Kountac\KountacBundle\Entity\Produits_2;
use Kountac\KountacBundle\Entity\Produits_3;
use Kountac\KountacBundle\Entity\Libelles_motif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Produit controller.
 *
 */
class ProduitsAdminController extends Controller
{
    /**
     * Lists all produit entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesProduits = $em->getRepository('KountacBundle:Produits_1')->findAll();
        
        $produits  = $this->get('knp_paginator')->paginate($listesProduits,$this->get('request')->query->get('page', 1),10);
        return $this->render('produits/index.html.twig', array(
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
                return $this->redirectToRoute('adminProduits_new2', array('id' => $produit->getId()));
            }
        }
        return $this->render('produits/new1.html.twig', array(
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
                return $this->redirectToRoute('adminProduits_new3', array('id' => $produit->getId()));
            }
        }
        return $this->render('produits/new2.html.twig', array(
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
            $stock = $produit_1->getStock();
            if ($this->getRequest()->request->get('stock_xs') != 0 ){
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
            
            if ($this->getRequest()->request->get('stock_2xl') != 0 ){
                $produit = new Produits_3();
                $stock_2xl = $this->getRequest()->request->get('stock_2xl') ;
                $produit_1->setStock($stock + $stock_2xl);
                $produit_2->setStock($produit_2->getStock() + $stock_2xl);
                $produit->setStock($stock_2xl);
                $produit->setTaille('44');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_3xl') != 0 ){
                $produit = new Produits_3();
                $stock_3xl = $this->getRequest()->request->get('stock_3xl') ;
                $produit_1->setStock($stock + $stock_3xl);
                $produit_2->setStock($produit_2->getStock() + $stock_3xl);
                $produit->setStock($stock_3xl);
                $produit->setTaille('46');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_4xl') != 0 ){
                $produit = new Produits_3();
                $stock_4xl = $this->getRequest()->request->get('stock_4xl') ;
                $produit_1->setStock($stock + $stock_4xl);
                $produit_2->setStock($produit_2->getStock() + $stock_4xl);
                $produit->setStock($stock_4xl);
                $produit->setTaille('48');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            if ($this->getRequest()->request->get('stock_5xl') != 0 ){
                $produit = new Produits_3();
                $stock_5xl = $this->getRequest()->request->get('stock_5xl') ;
                $produit_1->setStock($stock + $stock_5xl);
                $produit_2->setStock($produit_2->getStock() + $stock_5xl);
                $produit->setStock($stock_5xl);
                $produit->setTaille('50');
                $produit->setProduit2($produit_2);
                $em->persist($produit);
                $em->persist($produit_1);
                $em->persist($produit_2);
                $em->flush();
            }
            
            $this->get('session')->getFlashBag()->add('success','Taille(s) et stock(s) ajouté(s) avec succès');
            return $this->redirectToRoute('adminProduits_new2', array('id' => $produit_1->getId()));
        }
        return $this->render('produits/new3.html.twig', array(
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
        
        return $this->render('produits/new_resume.html.twig', array(
            'produit' => $produit,
            'user' => $user,
        ));
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
        return $this->redirectToRoute('adminProduits_new2', array('id' => $produit_1->getId()));
    }
    
    /**
     * Creates a new produit entity.
     *
     */
    public function newAction(Request $request)
    {
        $produit = new Produits();
        $paysEuro = array ();
        $paysCfa = array ();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsType', $produit);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                $produit->setMarque($user);
                $produit->setDateajout(new \DateTime('now'));
                $produit->setDateupdate(new \DateTime('now'));
                $produit->setPopularite(1); 
                $Euro = $form["euro"]->getData()->getPays();
                $Cfa = $form["cfa"]->getData()->getPays();
                
                foreach($Euro as $euro)
                {
                    $paysEuro[] = $euro->getNom();
                }
                foreach($Cfa as $cfa)
                {
                    $paysCfa[] = $cfa->getNom();
                }
                $produit->getEuro()->setPays($paysEuro);
                $produit->getCfa()->setPays($paysCfa);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();

                return $this->redirectToRoute('adminProduits_show', array('id' => $produit->getId()));
            }
        }
        return $this->render('produits/new.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produit entity.
     *
     */
    public function showAction(Request $request, Produits $produit)
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

                return $this->redirectToRoute('adminProduits_show', array('id' => $produit->getId()));
            }
        }
        return $this->render('produits/show.html.twig', array(
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
    public function addprixCommandeCfaAction(Request $request, Produits $produit)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddPriceCommandeType');
        $form->handleRequest($request);
        $prixCommande = $form["prixCommande"]->getData();
        $produit->getCfa()->setPrixCommande($prixCommande);
        $produit->setDateupdate(new \DateTime('now'));
        $em->persist($produit);
        $em->flush();
                
        $this->get('session')->getFlashBag()->add('success','Le prix de la commande sur mesure a été ajouté avec succès');
        return $this->redirectToRoute('adminProduits_show', array('id' => $produit->getId()));
    }

    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function editAction(Request $request, Produits $produit)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\ProduitsEditType', $produit);
        $editForm->handleRequest($request);
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsEditPaysType');
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $produit->setDateupdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();

            return $this->render('produits/editPays.html.twig', array(
                        'produit' => $produit,
                        'user' => $user,
                        'form_pays' => $form->createView(),
                        'form' => $editForm->createView(),
                        ))  ; 
        }

        return $this->render('produits/edit.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'form_pays' => $form->createView(),
            'form' => $editForm->createView(),
        ));
    }
    
    /**
     * Edit countries of a produit entity.
     *
     */
    public function editPaysAction(Request $request, Produits $produit)
    {
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\ProduitsEditPaysType');
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                $Euro = $form["euro"]->getData()->getPays();
                $prixEuro = $form["euro"]->getData()->getPrix();
                $prixCommandeEuro = $form["euro"]->getData()->getPrixCommande();
                $Cfa = $form["cfa"]->getData()->getPays();
                $prixCfa = $form["cfa"]->getData()->getPrix();
                $prixCommandeCfa = $form["cfa"]->getData()->getPrixCommande();
                foreach($Euro as $euro)
                {
                    $paysEuro[] = $euro->getNom();
                }
                foreach($Cfa as $cfa)
                {
                    $paysCfa[] = $cfa->getNom();
                }
                $produit->getEuro()->setPays($paysEuro);
                $produit->getEuro()->setPrix($prixEuro);
                $produit->getEuro()->setPrixCommande($prixCommandeEuro);
                $produit->getCfa()->setPays($paysCfa);
                $produit->getCfa()->setPrix($prixCfa);
                $produit->getCfa()->setPrixCommande($prixCommandeCfa);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success','Le modification du produit est terminée avec succès');
                return $this->redirectToRoute('adminProduits_show', array('id' => $produit->getId()));
            }
        }
        
        return $this->render('produits/editPays.html.twig', array(
            'produit' => $produit,
            'user' => $user,
            'form_pays' => $form->createView(),
        ));
        
    
    }
    
    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits')->find($id);
        
        $em->remove($produit);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Produit supprimé avec succès');
       
        return $this->redirectToRoute('adminProduits_index');
    }

     /**
     * Lists all produit out of stocks.
     *
     */
    public function stockAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesProduits = $em->getRepository('KountacBundle:Produits')->getProduitsAdminByStock();
        $produits  = $this->get('knp_paginator')->paginate($listesProduits,$this->get('request')->query->get('page', 1),10);
        return $this->render('produits/index.html.twig', array(
            'produits' => $produits,
            'user' => $user
        ));
    }
    
    /**
     * Add stock of a produit entity.
     *
     */
    public function addStockAction(Request $request, Produits $produit)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form_stock = $this->createForm('Kountac\KountacBundle\Form\ProduitsAddStockType');
        $form_stock->handleRequest($request);
        $stock = $form_stock["stock"]->getData();
        $produit->setStock($stock);
        $produit->setDateupdate(new \DateTime('now'));
        $em->persist($produit);
        $em->flush();
                
        $this->get('session')->getFlashBag()->add('success','Votre stock a été modifié avec succès');
        return $this->redirectToRoute('adminProduits_show', array('id' => $produit->getId()));
    }
}
