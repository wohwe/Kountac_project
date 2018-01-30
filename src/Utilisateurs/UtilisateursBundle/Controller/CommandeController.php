<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Kountac\KountacBundle\Entity\Commandes;
use Utilisateurs\UtilisateursBundle\Entity\Mesures;

class CommandeController extends Controller
{
    /**
     * List of commands.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $listesCommandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser($user);
        
        $commandes  = $this->get('knp_paginator')->paginate($listesCommandes,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:listeCommande.html.twig', array(
            'commandes' => $commandes,
            'user' => $user
        ));
    }
    
    /**
     * Creates a new Commandes entity.
     */
    public function newAction(Request $request)
    {
        $commande = new Commandes();
        
        $commande->setDate(new \DateTime('now'));
        $commande->setTerminer(0);
        $commande->setLivrer(0);
        $commande->setUtilisateur($this->getUser());
        $commande->setMesures($this->mesuresCommande());
        
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\CommandesType', $commande);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($commande);
                $em->flush();

                return $this->redirectToRoute('commande_index');
            }
        }
        
        return $this->render('FOSUserBundle:Profile:addCommande.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
            'user' => $user,
        ));
    }
    
    /**
     * Finds and displays a Commandes entity.
     */
    public function showAction(Commandes $commande)
    {
        $user = $this->getUser();
        
        return $this->render('FOSUserBundle:Profile:showCommande.html.twig', array(
            'commande' => $commande,
            'user' => $user,
        ));
    }

        
    /**
     * Displays a form to edit an existing Commandes entity.
     *
     */
    public function editAction(Request $request, Commandes $commande)
    {
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\CommandesType', $commande);
        $editForm->handleRequest($request);
        
        
        $user = $this->getUser();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Commande modifiée avec succès');
            return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
        }

        return $this->render('FOSUserBundle:Profile:editCommande.html.twig', array(
            'commande' => $commande,
            'form' => $editForm->createView(),
            'user' => $user,
            
        ));
    }
    
    /**
     * Deletes a Commandes entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('KountacBundle:Commandes')->find($id);
        
        $em->remove($commande);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Commande supprimée avec succès');
        
        return $this->redirectToRoute('commande_index');
    }
    
    /**
     * Set as delivired a Command.
     *
     */
    public function livrerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('KountacBundle:Commandes')->find($id);
        
        $commande->setLivrer(1);
        $commande->setDatelivraison(new \DateTime('now'));
        
        $em->persist($commande);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Votre commande a bien été livrée et vous l\'avez reçue');
        
        return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
    }

    /**
     * Creates a Mesures entity.
     */
    public function newMesuresAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $mesure = new Mesures();        
        $mesure->setUtilisateur($this->getUser());
        
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form_mesure = $this->createForm('Utilisateurs\UtilisateursBundle\Form\MesuresType', $mesure);
        
        if ($request->getMethod() == 'POST') 
        {
            $form_mesure->handleRequest($request);

            if ($form_mesure->isSubmitted() && $form_mesure->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($mesure);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Nouvelles mesures ajoutées avec succès');
                return $this->redirectToRoute('commande_mesures_new');
            }
         
        }
        
        return $this->render('FOSUserBundle:Profile:addMesureCommande.html.twig', array(
            'form_mesure' => $form_mesure->createView(),
            'user' => $user,
        ));
    }
    
    /**
     * Creates a Mesures entity.
     */
    public function newMesuresProfilAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $mesure = new Mesures();        
        $mesure->setUtilisateur($this->getUser());
        $mesure->setTitulaire('Moi même');
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form_mesure = $this->createForm('Utilisateurs\UtilisateursBundle\Form\MesuresType', $mesure);
        
        if ($request->getMethod() == 'POST') 
        {
            $form_mesure->handleRequest($request);

            if ($form_mesure->isSubmitted() && $form_mesure->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($mesure);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success','Nouvelles mesures ajoutées avec succès');
                return $this->redirectToRoute('commande_mesures_new');
            }
         
        }
        
        return $this->render('FOSUserBundle:Profile:addMesure.html.twig', array(
            'form_mesure' => $form_mesure->createView(),
            'user' => $user,
        ));
    }
    
    
    /**
     * Select a mesure on session.
     */
    public function validationMesureAction()
    {
        if ($this->get('request')->getMethod() == 'POST')
        {
            $this->setMesureOnSession();           
        }
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $mesures = $session->get('mesures');
        
        $commande = new Commandes();
        $user = $this->getUser();
        $commande->setDate(new \DateTime('now'));
        $commande->setTerminer(0);
        $commande->setUtilisateur($this->getUser());
        
        $form = $this->createForm('Kountac\KountacBundle\Form\CommandesType', $commande);
        
        $mesure = $em->getRepository('UtilisateursBundle:Mesures')->find($mesures['mesure']);
        
        
        
        return $this->render('FOSUserBundle:Profile:newCommande.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
            'user' => $user,
            'mesure' => $mesure,
        ));
    }
    
    /**
     * Deletes a mesure entity.
     *
     */
    public function deleteMesuresAction($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $mesure = $em->getRepository('UtilisateursBundle:Mesures')->find($id);
        
        $em->remove($mesure);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Mesures supprimées avec succès');
        return $this->redirectToRoute('commande_mesures_new');
    }
    
    
    public function setMesureOnSession()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('mesure')) 
            $session->set('mesure',array());
        
        $mesures = $session->get('mesures');
        
        if ($this->getRequest()->request->get('mesure') != null)
        {
            $mesures['mesure'] = $this->getRequest()->request->get('mesure');
        } else {
            return $this->redirect($this->generateUrl('commande_new'));
        }
        
        $session->set('mesures',$mesures);
        return $this->redirect($this->generateUrl('commande_new'));
    }
    
    
    public function mesuresCommande() 
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $mesures = $session->get('mesures');        
        $mesure = array();
        $mesureSession = $em->getRepository('UtilisateursBundle:Mesures')->find($mesures['mesure']);        
        $mesure['mesureCommande'] = array('titulaire' => $mesureSession->getTitulaire(),
                                    'genre' => $mesureSession->getGenre(),
                                    'tp' => $mesureSession->getPoitrine(),
                                    'tt' => $mesureSession->getTaille(),
                                    'tb' => $mesureSession->getBassin(),
                                    'ee' => $mesureSession->getEpaules(),                                    
                                    'ss' => $mesureSession->getSeins(),
                                    'et' => $mesureSession->getEpauletaille(),
                                    'l' => $mesureSession->getLongueur(),
                                    'hp' => $mesureSession->getHauteurPoitrine(),
                                    'dep' => $mesureSession->getDemiEcartPoitrine(),
                                    'tph' => $mesureSession->getTourPetitesHanches(),
                                    'tgh' => $mesureSession->getTourGrandesHanches(),
                                    'dte' => $mesureSession->getdemiTourEncolure(),
                                    'dcdo' => $mesureSession->getDemiCarrureDos(),
                                    'dcde' => $mesureSession->getDemiCarrureDevant(),
                                    'ltdo' => $mesureSession->getTailleDos(),
                                    'ltde' => $mesureSession->getTailleDevant(),
                                    'le' => $mesureSession->getLongueurEpaule(),
                                    'te' => $mesureSession->getTourEmmanchure(),
                                    'hdb' => $mesureSession->getHauteurDessousBras(),
                                    'lb' => $mesureSession->getLongueurBras(),
                                    'gb' => $mesureSession->getGrosseurBras(),
                                    'hc' => $mesureSession->getHauteurCoude(),
                                    'tpo' => $mesureSession->getTourPoignet(),
                                    'hth' => $mesureSession->getHauteurTailleHanche(),
                                    'hm' => $mesureSession->getHauteurMontant(),
                                    'e' => $mesureSession->getEnfourchure(),
                                    'htg' => $mesureSession->getHauteurTailleGenou(),
                                    'htt' => $mesureSession->getHauteurTailleTerre(),
                                    'htct' => $mesureSession->getHauteurTailleCoteTerre()
                )
                ;
        return $mesure;
    }
    
}
