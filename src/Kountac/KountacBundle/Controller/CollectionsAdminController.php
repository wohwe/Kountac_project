<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\Collections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collection controller.
 *
 */
class CollectionsAdminController extends Controller
{
    /**
     * Lists all collection entities.
     *
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $listeCollections = $em->getRepository('KountacBundle:Collections')->findAll();
        $collections  = $this->get('knp_paginator')->paginate($listeCollections,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('collections/index.html.twig', array(
            'collections' => $collections,
            'user' => $user,
        ));
    }

    /**
     * Creates a new collection entity.
     *
     */
    public function newAction(Request $request)
    {

        include 'localisation.php';
        $user = $this->getUser();
        $collection = new Collections();
        $form = $this->createForm('Kountac\KountacBundle\Form\CollectionsType', $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($collection);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Nouvelle collection ajoutée avec succès');
            return $this->redirectToRoute('adminCollections_index');
        }

        return $this->render('collections/new.html.twig', array(
            'collection' => $collection,
            'form' => $form->createView(),
            'user' => $user,
        ));
    }

    
    /**
     * Displays a form to edit an existing collection entity.
     *
     */
    public function editAction(Request $request, Collections $collection)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\CollectionsType', $collection);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add('success','Collection modifiée avec succès');
            return $this->redirectToRoute('adminCollections_index');
        }

        return $this->render('collections/edit.html.twig', array(
            'collection' => $collection,
            'form' => $editForm->createView(),
            'user' => $user,
        ));
    }

    
    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $session = $this->getRequest()->getSession();
        include 'localisation.php';
        $em = $this->getDoctrine()->getManager();
        $collection = $em->getRepository('KountacBundle:Collections')->find($id);
        
        $em->remove($collection);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Collection supprimée avec succès');
       
        return $this->redirectToRoute('adminCollections_index');
    }
    
}
