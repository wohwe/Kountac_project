<?php

namespace Kountac\KountacBundle\Controller;

use Kountac\KountacBundle\Entity\Pages;
use Kountac\KountacBundle\Entity\Images;
use Kountac\KountacBundle\Entity\Collections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collection controller.
 *
 */
class PagesAdminController extends Controller
{
    /**
     * Lists all collection entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $listePages = $em->getRepository('KountacBundle:Pages')->findAll();
        $pages  = $this->get('knp_paginator')->paginate($listePages,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('pages/index.html.twig', array(
            'pages' => $pages,
            'user' => $user,
        ));
    }

    
    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('KountacBundle:Pages')->find($id);
        
        $em->remove($page);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Page supprimé avec succès');
       
        return $this->redirectToRoute('adminPages_index');
    }

    
    /**
     * Add a produit entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pages = new Pages();
        $user = $this->getUser();
        $listeImages = $em->getRepository('KountacBundle:Images')->findAll();
        $images0  = $this->get('knp_paginator')->paginate($listeImages,$this->get('request')->query->get('page', 1),10);
        $form = $this->createForm('Kountac\KountacBundle\Form\PagesType', $pages);
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
                                
                $em = $this->getDoctrine()->getManager();
                $post = $form->getData();
                $lien = str_replace(' ', '-', strtolower($post->getTitre()));
                $pages->setLien($lien);
                $em->persist($pages);
                $em->flush();
                
                //$this->get('session')->getFlashBag()->add('success','Nouvelle page ajouté avec succès');

                $user = $this->getUser();
        
                $listePages = $em->getRepository('KountacBundle:Pages')->findAll();
                $pages  = $this->get('knp_paginator')->paginate($listePages,$this->get('request')->query->get('page', 1),10);
                
                return $this->redirectToRoute('adminPages_index', array(
                    'images' => $images0,
                    'pages' => $pages,
                    'user' => $user,
                ));
            }
        }

        return $this->render('pages/new.html.twig', array(
            'images' => $images0,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    
    /**
     * Edit a produit entity.
     *
     */
    public function editAction(Request $request, Pages $pages)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $listeImages = $em->getRepository('KountacBundle:Images')->findAll();
        $images0  = $this->get('knp_paginator')->paginate($listeImages,$this->get('request')->query->get('page', 1),10);
        $editForm = $this->createForm('Kountac\KountacBundle\Form\PagesType', $pages);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add('success','Pages modifiée avec succès');
            return $this->redirectToRoute('adminPages_index');
        }

        return $this->render('pages/edit.html.twig', array(
            'pages' => $pages,
            'images' => $images0,
            'form' => $editForm->createView(),
            'user' => $user,
        ));
    }
    
    /**
     * Add a image entity.
     *
     */
    public function imageAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pages = new Pages();
        $user = $this->getUser();

        $listeImages = $em->getRepository('KountacBundle:Images')->findAll();
        $images0  = $this->get('knp_paginator')->paginate($listeImages,$this->get('request')->query->get('page', 1),10);
        
        $image = new Images();
        $form = $this->createForm('Kountac\KountacBundle\Form\ImagesType', $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $image->getLien();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            // updates the 'lien' property to store the PDF file name
            // instead of its contents
            $image->setLien($fileName);

            // ... persist the $image variable or any other work
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('adminPages_images', array(
                'images' => $image,
                'user' => $user,
            ));
        }

        return $this->render('pages/image.html.twig', array(
            'images' => $images0,
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    public function afficheAction($valeur){

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $listePages = $em->getRepository('KountacBundle:Pages')->getOne($valeur);
        $pages  = $this->get('knp_paginator')->paginate($listePages,$this->get('request')->query->get('page', 1),10);

        return $this->render('pages/other.html.twig', array(
            'pages' => $pages,
            'user' => $user,
        ));
    }


    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    
}
