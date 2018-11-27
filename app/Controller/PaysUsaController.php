<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\PaysUsa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Paysusa controller.
 *
 */
class PaysUsaController extends Controller
{
    /**
     * Lists all paysUsa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ListePaysUsa = $em->getRepository('KountacBundle:PaysUsa')->findAll();
        $paysUsas  = $this->get('knp_paginator')->paginate($ListePaysUsa,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('paysusa/index.html.twig', array(
            'paysUsas' => $paysUsas,
            'user' => $this->getUser(),
        ));
    }

    /**
     * Creates a new paysUsa entity.
     *
     */
    public function newAction(Request $request)
    {
        $paysUsa = new Paysusa();
        $form = $this->createForm('Kountac\KountacBundle\Form\PaysUsaType', $paysUsa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paysUsa);
            $em->flush();

            return $this->redirectToRoute('adminPaysUsa_index');
        }

        return $this->render('paysusa/new.html.twig', array(
            'paysUsa' => $paysUsa,
            'form' => $form->createView(),
            'user' => $this->getUser(),
        ));
    }

    /**
     * Displays a form to edit an existing paysUsa entity.
     *
     */
    public function editAction(Request $request, PaysUsa $paysUsa)
    {
        $editForm = $this->createForm('Kountac\KountacBundle\Form\PaysUsaType', $paysUsa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminPaysUsa_edit', array('id' => $paysUsa->getId()));
        }

        return $this->render('paysusa/edit.html.twig', array(
            'paysUsa' => $paysUsa,
            'edit_form' => $editForm->createView(),
            'user' => $this->getUser(),
        ));
    }

    /**
     * Deletes a paysUsa entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paysUsa = $em->getRepository('KountacBundle:PaysUsa')->find($id);
        
        $em->remove($paysUsa);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Pays de la zone USD ($) supprimée avec succès');
       
        return $this->redirectToRoute('adminPaysUsa_index');
    }
}
