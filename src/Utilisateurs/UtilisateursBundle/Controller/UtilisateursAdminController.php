<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Utilisateur controller.
 *
 */
class UtilisateursAdminController extends Controller
{
    /**
     * Displays an admin profile entity.
     *
     */
    public function profileAction()
    {
        $user = $this->getUser();
        
        return $this->render('utilisateurs/profile.html.twig', array(
            'user' => $user,
        ));
    }
    
    /**
     * Lists all utilisateur entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $listeUtilisateurs = $em->getRepository('UtilisateursBundle:Utilisateurs')->findAll();
        $utilisateurs  = $this->get('knp_paginator')->paginate($listeUtilisateurs,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('utilisateurs/index.html.twig', array(
            'utilisateurs' => $utilisateurs,
            'user' => $user,
        ));
    }

    
    /**
     * Finds and displays a utilisateur entity.
     *
     */
    public function showAction(Utilisateurs $utilisateur)
    {
        $user = $this->getUser();
        
        return $this->render('utilisateurs/show.html.twig', array(
            'utilisateur' => $utilisateur,
            'user' => $user,
        ));
    }

    /**
     * Disabled an utilisateur account.
     *
     */
    public function disabledAction(Utilisateurs $utilisateur)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur->setEnabled(0);
        $em->persist($utilisateur);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success','Compte utilisateur bloqué avec succès');
        
        return $this->redirectToRoute('adminUtilisateurs_index');
    }
    
    /**
     * Enabled an utilisateur account.
     *
     */
    public function enabledAction(Utilisateurs $utilisateur)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur->setEnabled(1);
        $em->persist($utilisateur);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success','Compte utilisateur activé avec succès');
        
        return $this->redirectToRoute('adminUtilisateurs_index');
    }

    
    /**
     * Deletes an Utilisateur entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);
        
        $em->remove($utilisateur);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Compte utilisateut supprimé avec succès');
        
        return $this->redirectToRoute('adminUtilisateurs_index');
    }
}
