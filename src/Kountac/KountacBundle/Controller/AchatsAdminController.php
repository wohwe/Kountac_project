<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Achat controller.
 *
 */
class AchatsAdminController extends Controller
{      
    /**
     * Lists all achat entities.
     *
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $listeAchats = $em->getRepository('KountacBundle:Achats')->getAllFacture();
        
        $achats  = $this->get('knp_paginator')->paginate($listeAchats,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('achats/index.html.twig', array(
            'achats' => $achats, 
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'all' => $this->getRequest()->getSession()->get('all'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }   
    
    /**
     * Deletes an achat entity.
     *
     */
    public function deleteAction($id)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $achat = $em->getRepository('KountacBundle:Achats')->find($id);
        
        $em->remove($achat);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Commande supprimée avec succès');
       
        return $this->redirectToRoute('adminAchats_index');
    }
}
