<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Category controller.
 *
 */
class CategoriesAdminController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $listeCategories = $em->getRepository('KountacBundle:Categories')->findAll();
        $categories  = $this->get('knp_paginator')->paginate($listeCategories,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('categories/index.html.twig', array(
            'categories' => $categories,
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $category = new Categories();
        $form = $this->createForm('Kountac\KountacBundle\Form\CategoriesType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Nouvelle catégorie ajoutée avec succès');
            return $this->redirectToRoute('adminCategories_index');
        }

        return $this->render('categories/new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
            'user' => $user,
        ));
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction(Request $request, Categories $category)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\KountacBundle\Form\CategoriesType', $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add('success','Catégorie modifiée avec succès');
            return $this->redirectToRoute('adminCategories_index');
        }

        return $this->render('categories/edit.html.twig', array(
            'category' => $category,
            'form' => $editForm->createView(),
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }

    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('KountacBundle:Categories')->find($id);
        
        $em->remove($category);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Catégorie supprimée avec succès');
       
        return $this->redirectToRoute('adminCategories_index');
    }
}
