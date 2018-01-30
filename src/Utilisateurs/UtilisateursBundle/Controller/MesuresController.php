<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Utilisateurs\UtilisateursBundle\Entity\Mesures;

class MesuresController extends Controller
{
    /**
     * List of commands.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $listesMesures = $em->getRepository('UtilisateursBundle:Mesures')->getMesuresByUser($user);
        
        $mesures  = $this->get('knp_paginator')->paginate($listesMesures,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:listeMesures.html.twig', array(
            'mesures' => $mesures,
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }
    
    /**
     * Creates a Mesures entity.
     */
    public function newAction(Request $request)
    {
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
                
                $this->get('session')->getFlashBag()->add('success','Mesures ajoutées avec succès');
                return $this->redirectToRoute('mesures_index');
            }
        }
        
        return $this->render('FOSUserBundle:Profile:addMesures.html.twig', array(
            'form_mesure' => $form_mesure->createView(),
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }
    
    /**
     * Displays a form to edit an existing Mesure entity.
     *
     */
    public function editAction(Request $request, Mesures $mesure)
    {
        $em = $this->getDoctrine()->getManager();
        $editForm = $this->createForm('Utilisateurs\UtilisateursBundle\Form\MesuresType', $mesure);
        $editForm->handleRequest($request);
        $user = $this->getUser();
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mesure);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','mesure modifiée avec succès');
            return $this->redirectToRoute('mesures_index');
        }

        return $this->render('FOSUserBundle:Profile:editMesures.html.twig', array(
            'mesure' => $mesure,
            'form_mesure' => $editForm->createView(),
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
            
        ));
    }
    
    /**
     * Deletes a mesure entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mesure = $em->getRepository('UtilisateursBundle:Mesures')->find($id);
        
        $em->remove($mesure);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Mesures supprimées avec succès');
        return $this->redirectToRoute('mesures_index');
    }
}
