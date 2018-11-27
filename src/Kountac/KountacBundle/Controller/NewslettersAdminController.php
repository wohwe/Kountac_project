<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\Collections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collection controller.
 *
 */
class NewslettersAdminController extends Controller
{
    /**
     * Lists all collection entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $listeNewsletters = $em->getRepository('KountacBundle:Newsletters')->findAll();
        $newsletters  = $this->get('knp_paginator')->paginate($listeNewsletters,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('newsletters/index.html.twig', array(
            'newsletters' => $newsletters,
            'user' => $user,
        ));
    }

    
    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $newsletter = $em->getRepository('KountacBundle:Newsletters')->find($id);
        
        $em->remove($newsletter);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Enregistrement à la newsletter OrNoir supprimé avec succès');
       
        return $this->redirectToRoute('adminNewsletters_index');
    }
    
}
