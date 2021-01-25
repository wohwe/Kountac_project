<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Entity\Reservations;

class ReservationsController extends Controller
{
    /**
     * List of commands.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $listesReservations = $em->getRepository('KountacBundle:Reservations')->getReservationsByUser($user);
        
        $reservations  = $this->get('knp_paginator')->paginate($listesReservations,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:listeReservations.html.twig', array('cfa' => $this->getRequest()->getSession()->get('cfa'),
            'reservations' => $reservations,
            'euro' => $session->get('euro'),
            'usa' => $session->get('usa'),
            'livre' => $session->get('livre'),
            'naira' => $session->get('naira'),
            'cfa' => $session->get('cfa'),
            'user' => $user
        ));
    }
    
    /**
     * Creates a Mesures entity.
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = new Reservations();       
        $session = $this->getRequest()->getSession();
        $user = $this->getUser();
        $produit = $em->getRepository('KountacBundle:Produits_3')->find($id);
        $reservation->setUtilisateur($user);
        $reservation->setMarque($produit->getProduit2()->getProduit1()->getMarque());
        $reservation->setProduit($produit);
        $reservation->setDate(new \DateTime('now'));
        
        $em->persist($reservation);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success','Votre nouvelle réservation a été ajoutée avec succès');
        return $this->redirectToRoute('reserve_index');
    }
    
    /**
     * Deletes a mesure entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository('KountacBundle:Reservations')->find($id);
        
        $em->remove($reservation);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Réservation supprimée avec succès');
        return $this->redirectToRoute('reserve_index');
    }
}
