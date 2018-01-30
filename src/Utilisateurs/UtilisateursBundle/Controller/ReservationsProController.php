<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReservationsProController extends Controller
{
    /**
     * List of commands.
     */
    public function allAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $listesReservations = $em->getRepository('KountacBundle:Reservations')->findAll();
        
        $reservations  = $this->get('knp_paginator')->paginate($listesReservations,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeReservations.html.twig', array(
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa'),
            'reservations' => $reservations,
            'user' => $user
        ));
    }
    
    /**
     * List of commands.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $listesReservations = $em->getRepository('KountacBundle:Reservations')->getReservationsByMarque($user);
        
        $reservations  = $this->get('knp_paginator')->paginate($listesReservations,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesReservations.html.twig', array(
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa'),
            'reservations' => $reservations,
            'user' => $user
        ));
    }
    
}
