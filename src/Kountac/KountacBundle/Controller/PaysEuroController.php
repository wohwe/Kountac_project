<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\PaysEuro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Payseuro controller.
 *
 */
class PaysEuroController extends Controller
{
    /**
     * Lists all paysEuro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $ListePaysEuro = $em->getRepository('KountacBundle:PaysEuro')->findAll();
        $paysEuros  = $this->get('knp_paginator')->paginate($ListePaysEuro,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('payseuro/index.html.twig', array(
            'paysEuros' => $paysEuros,
            'user' => $user,
        ));
    }

    /**
     * Creates a new paysEuro entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $paysEuro = new Payseuro();
        $form = $this->createForm('Kountac\KountacBundle\Form\PaysEuroType', $paysEuro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paysEuro);
            $em->flush();

            return $this->redirectToRoute('adminPaysEuro_index');
        }

        return $this->render('payseuro/new.html.twig', array(
            'paysEuro' => $paysEuro,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paysEuro entity.
     *
     */
    public function showAction(PaysEuro $paysEuro)
    {
        $deleteForm = $this->createDeleteForm($paysEuro);

        return $this->render('payseuro/show.html.twig', array(
            'paysEuro' => $paysEuro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paysEuro entity.
     *
     */
    public function editAction(Request $request, PaysEuro $paysEuro)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\PaysEuroType', $paysEuro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminPaysEuro_edit', array('id' => $paysEuro->getId()));
        }

        return $this->render('payseuro/edit.html.twig', array(
            'paysEuro' => $paysEuro,
            'user' => $user,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a paysEuro entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paysEuro = $em->getRepository('KountacBundle:PaysEuro')->find($id);
        
        $em->remove($paysEuro);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Pays de la zone Euro (€) supprimée avec succès');
       
        return $this->redirectToRoute('adminPaysEuro_index');
    }
}
