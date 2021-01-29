<?php

namespace Kountac\KountacBundle\Controller;

use Utilisateurs\UtilisateursBundle\Entity\Mesures;
use Kountac\KountacBundle\Entity\Commandes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commande controller.
 *
 */
class CommandesAdminController extends Controller
{
    /**
     * Lists all commande entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesCommandes = $em->getRepository('KountacBundle:Commandes')->findAll();
        
        $commandes  = $this->get('knp_paginator')->paginate($listesCommandes,$this->get('request')->query->get('page', 1),10);
        return $this->render('commandes/index.html.twig', array(
            'commandes' => $commandes,
            'user' => $user
        ));
    }
    
    
    /**
     * Creates a new commande entity.
     *
     */
    public function newAction(Request $request)
    {
        $commande = new Commande();
        $form = $this->createForm('Kountac\KountacBundle\Form\CommandesType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Nouvelle commande a bien été enregistrée avec succès');
        
            return $this->redirectToRoute('adminCommandes_show', array('id' => $commande->getId()));
        }

        return $this->render('commandes/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Commandes entity.
     */
    public function showAction(Request $request, Commandes $commande)
    {
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\CommandesAddPriceType', $commande);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $commande->setDateacceptation(new \DateTime('now'));
                $commande->setTerminer(1);
                $commande->setMarque($user);
                $em->persist($commande);
                $em->flush();

                return $this->redirectToRoute('adminCommandes_index');
            }
        }
        return $this->render('commandes/show.html.twig', array(
            'commande' => $commande,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Set as sent a Command.
     *
     */
    public function envoyerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('KountacBundle:Commandes')->find($id);
        
        $commande->setEnvoyer(1);
        $commande->setDateenvoi(new \DateTime('now'));
        
        $em->persist($commande);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Votre commande a bien été enregistrée comme étant envoyée au client, attente de la confirmation du client');
        
        return $this->redirectToRoute('adminCommandes_show', array('id' => $commande->getId()));
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
        
        return $this->redirectToRoute('adminCommandes_show', array('id' => $commande->getId()));
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
            return $this->redirectToRoute('adminCommandes_show', array('id' => $commande->getId()));
        }

        return $this->render('commandes/edit.html.twig', array(
            'commande' => $commande,
            'form' => $editForm->createView(),
            'user' => $user,
            
        ));
    }
    
    /**
     * Creates a Mesures entity.
     */
    public function newMesuresAction(Request $request)
    {
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
                return $this->redirectToRoute('adminCommandes_mesures_new');
            }
         
        }
        
        return $this->render('commandes/mesures.html.twig', array(
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
        
        return $this->render('commandes/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
            'user' => $user,
            'mesure' => $mesure,
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
        
        return $this->redirectToRoute('adminCommandes_index');
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
            return $this->redirect($this->generateUrl('adminCommandes_new'));
        }
        
        $session->set('mesures',$mesures);
        return $this->redirect($this->generateUrl('adminCommandes_new'));
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
