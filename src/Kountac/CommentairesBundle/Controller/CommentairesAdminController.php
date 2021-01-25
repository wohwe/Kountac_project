<?php

namespace Kountac\CommentairesBundle\Controller;

use Kountac\CommentairesBundle\Entity\Commentaires;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaire controller.
 */
class CommentairesAdminController extends Controller
{
    /**
     * Lists all commentaire entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $listeCommentaires = $em->getRepository('CommentairesBundle:Commentaires')->findAll();
        $commentaires  = $this->get('knp_paginator')->paginate($listeCommentaires,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('commentaires/index.html.twig', array(
            'commentaires' => $commentaires,
            'user' => $user,
        ));
    }

    /**
     * Creates a new commentaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $commentaire = new Commentaires();
        $commentaire->setDate(new \DateTime('now'));
        $commentaire->setPseudo($user);
        
        $form = $this->createForm('Kountac\CommentairesBundle\Form\CommentaireAdminType', $commentaire);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success','Nouveau commentaire créé avec succès');
            return $this->redirectToRoute('adminCommentaires_show', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaires/new.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'user' => $user,
        ));
    }

    /**
     * Finds and displays a commentaire entity.
     *
     */
    public function showAction(Commentaires $commentaire)
    {
        $user = $this->getUser();
        
        return $this->render('commentaires/show.html.twig', array(
            'commentaire' => $commentaire,
            'user' => $user,
        ));
    }

    /**
     * Displays a form to edit an existing commentaire entity.
     *
     */
    public function editAction(Request $request, Commentaires $commentaire)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Kountac\CommentairesBundle\Form\CommentaireAdminType', $commentaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            $this->get('session')->getFlashBag()->add('success','Commentaire modifié avec succès');
            return $this->redirectToRoute('adminCommentaires_show', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaires/edit.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $editForm->createView(),
            'user' => $user,
        ));
    }

    /**
     * Deletes a commentaire entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('CommentairesBundle:Commentaires')->find($id);
        
        $em->remove($commentaire);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Commentaire supprimé avec succès');
       
        return $this->redirectToRoute('adminCommentaires_index');
    }
}
