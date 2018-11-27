<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Entity\Mannequin;
use Symfony\Component\HttpFoundation\Request;

use Kountac\KountacBundle\Entity\Produits_2;

class MannequinsProController extends Controller
{
    /**
     * List of Mannequins.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $listesMannequins = $em->getRepository('KountacBundle:Mannequin')->findByMarque($user);
        
        $mannequins  = $this->get('knp_paginator')->paginate($listesMannequins,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMannequins.html.twig', array(
            'cfa' => $session->get('cfa'),
            'mannequins' => $mannequins,
            'euro' => $session->get('euro'),
            'usa' => $session->get('usa'),
            'livre' => $session->get('livre'),
            'naira' => $session->get('naira'),
            'cfa' => $session->get('cfa'),
            'user' => $user
        ));
    }
    
    /**
     * Creates a Mannequin entity.
     */
    public function newAction(Request $request)
    {
        $mannequin = new Mannequin();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Kountac\KountacBundle\Form\MannequinType', $mannequin);
        $user = $this->getUser();
        
        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
        
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $mannequin->setMarque($user);
                $mannequin->setDateUpdate(new \DateTime('now'));
                $mannequin->setDateAjout(new \DateTime('now'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($mannequin);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Mannequin ajouté avec succès');
                return $this->redirectToRoute('mannequin_pro_index');
            }
        }
        
        return $this->render('FOSUserBundle:Profile:Pro/addMannequinPro.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }
    
    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function editAction(Request $request, Mannequin $mannequin)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\MannequinType', $mannequin);
        $editForm->handleRequest($request);
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $mannequin->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            
            $this->get('session')->getFlashBag()->add('success','les informations du mannequin ont été modifiées avec succès');
            return $this->redirectToRoute('mannequin_pro_index');        
        }

        return $this->render('FOSUserBundle:Profile:Pro/editMannequinPro.html.twig', array(
            'mannequin' => $mannequin,
            'user' => $user,
            'form' => $editForm->createView(),
        ));
    }
    
    /**
     * Deletes a mesure entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mannequin = $em->getRepository('KountacBundle:Mannequin')->find($id);
        
        $em->remove($mannequin);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Mannequin supprimé avec succès !');
        return $this->redirectToRoute('mannequin_pro_index');
    }
    
    /**
     * Creates a new produit entity.
     *
     */
    public function new_produit_mannequinAction(Request $request, $id, $id_motif)
    {
        $produit = new Produits_2();
        $em = $this->getDoctrine()->getManager();
        $produit_1 = $em->getRepository('KountacBundle:Produits_1')->find($id);
        $libelle = $em->getRepository('KountacBundle:Libelles_motif')->find($id_motif);
        $user = $this->getUser();
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findByDisponible($user);
        $form = $this->createForm('Kountac\KountacBundle\Form\Produits_2_MannequinType', $produit);
        $form->handleRequest($request);
        $form_motif = $this->createForm('Kountac\KountacBundle\Form\Libelles_motifType');
        $form_mannequin = $this->createForm('Kountac\KountacBundle\Form\MannequinType');
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                $produit->setProduit1($produit_1);
                $produit->setLibelle($libelle);
                $em->persist($produit);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Nouveau Mannequin pour motif ajouté avec succès');
                return $this->redirectToRoute('produit_pro_new_3', array('id' => $produit->getId()));
            }
        }
        return $this->render('FOSUserBundle:Profile:Pro/addProduits_2_MannequinPro.html.twig', array(
            'produit' => $produit,
            'libelle' => $libelle,
            'mannequins' => $mannequins,
            'produit_1' => $produit_1,
            'user' => $user,
            'form' => $form->createView(),
            'form_motif' => $form_motif->createView(),
            'form_mannequin' => $form_mannequin->createView(),
        ));
    }

}
