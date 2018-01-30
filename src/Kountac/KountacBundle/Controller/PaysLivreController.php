<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\PaysLivre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Payslivre controller.
 *
 */
class PaysLivreController extends Controller
{
    /**
     * Lists all paysLivre entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $ListePaysLivre = $em->getRepository('KountacBundle:PaysLivre')->findAll();
        $paysLivres  = $this->get('knp_paginator')->paginate($ListePaysLivre,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('payslivre/index.html.twig', array(
            'paysLivres' => $paysLivres,
            'user' => $user,
        ));
    }

    /**
     * Creates a new paysLivre entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $paysLivre = new Payslivre();
        $form = $this->createForm('Kountac\KountacBundle\Form\PaysLivreType', $paysLivre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paysLivre);
            $em->flush();

            return $this->redirectToRoute('adminPaysLivre_index');
        }

        return $this->render('payslivre/new.html.twig', array(
            'paysLivre' => $paysLivre,
            'form' => $form->createView(),
            'user' => $user,
        ));
    }

    
    /**
     * Displays a form to edit an existing paysLivre entity.
     *
     */
    public function editAction(Request $request, PaysLivre $paysLivre)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\PaysLivreType', $paysLivre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminPaysLivre_edit', array('id' => $paysLivre->getId()));
        }

        return $this->render('payslivre/edit.html.twig', array(
            'paysLivre' => $paysLivre,
            'edit_form' => $editForm->createView(),
            'user' => $user,
        ));
    }

    /**
     * Deletes a paysLivre entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paysLivre = $em->getRepository('KountacBundle:PaysLivre')->find($id);
        
        $em->remove($paysLivre);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Pays de la zone Livre (£) supprimée avec succès');
       
        return $this->redirectToRoute('adminPaysLivre_index');
    }
}
