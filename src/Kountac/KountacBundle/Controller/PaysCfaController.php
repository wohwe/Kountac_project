<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\PaysCfa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Payscfa controller.
 *
 */
class PaysCfaController extends Controller
{
    /**
     * Lists all paysCfa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $ListePaysCfa = $em->getRepository('KountacBundle:PaysCfa')->findAll();
        $paysCfas  = $this->get('knp_paginator')->paginate($ListePaysCfa,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('payscfa/index.html.twig', array(
            'paysCfas' => $paysCfas,
            'user' => $user,
        ));
    }

    /**
     * Creates a new paysCfa entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $paysCfa = new Payscfa();
        $form = $this->createForm('Kountac\KountacBundle\Form\PaysCfaType', $paysCfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paysCfa);
            $em->flush();

            return $this->redirectToRoute('adminPaysCfa_index');
        }

        return $this->render('payscfa/new.html.twig', array(
            'paysCfa' => $paysCfa,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paysCfa entity.
     *
     */
    public function editAction(Request $request, PaysCfa $paysCfa)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\PaysCfaType', $paysCfa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminPaysCfa_edit', array('id' => $paysCfa->getId()));
        }

        return $this->render('payscfa/edit.html.twig', array(
            'paysCfa' => $paysCfa,
            'user' => $user,
            'edit_form' => $editForm->createView(),
        ));
    }

    
     /**
     * Deletes a paysCfa entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paysCfa = $em->getRepository('KountacBundle:PaysCfa')->find($id);
        
        $em->remove($paysCfa);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Pays de la zone F CFA supprimée avec succès');
       
        return $this->redirectToRoute('adminPaysCfa_index');
    }
}
