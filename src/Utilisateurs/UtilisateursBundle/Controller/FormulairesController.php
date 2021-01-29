<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Produit controller.
 *
 */
class FormulairesController extends Controller
{
    /**
     * Forms for mannequins.
     *
     */
    public function mannequinFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $user = $this->getUser();
        $form_mannequin = $this->createForm('Kountac\KountacBundle\Form\MannequinType');
        
        return $this->render('FOSUserBundle:Profile:Pro/Produits/addProduits_mannequin.html.twig', array(
            'user' => $user,
            'motif' => $produit_2,
            'form_mannequin' => $form_mannequin->createView(),
        ));
    }  
    
    
    /**
     * Forms for pictures add.
     *
     */
    public function imagesFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $user = $this->getUser();
        $form_images = $this->createForm('Kountac\KountacBundle\Form\Media_motifType');
        
        return $this->render('FOSUserBundle:Profile:Pro/Produits/addProduits_images.html.twig', array(
            'user' => $user,
            'motif' => $produit_2,
            'form_images' => $form_images->createView()
        ));
    }  
    
    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function images_editFormAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('KountacBundle:Media_motif')->find($id);
        $produit_2 = $image->getProduit2();
        
        $form_images = $this->createForm('Kountac\KountacBundle\Form\Media_motifType', $image);
        
        return $this->render('FOSUserBundle:Profile:Pro/Produits/addProduits_images_edit_form.html.twig', array(
            'user' => $user,
            'image' => $image,
            'motif' => $produit_2,
            'form_images' => $form_images->createView()
        ));
    }
    
    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function addImagesMannequinAction(Request $request, $id)
    {
    if ($this->get('request')->getMethod() == 'POST') 
        {
            $em = $this->getDoctrine()->getManager();
            $image = $em->getRepository('KountacBundle:Media_motif')->find($id);
            $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
            $form_images = $this->createForm('Kountac\KountacBundle\Form\Media_motifType', $image);
            $form_images->handleRequest($request);
            $top = $form_images['top']->getData();
            
            if ($top == 0) {
                $image_top = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('top' => '0','produit_2' => $produit_2) );       
                if ($image_top != NULL){
                    $image_top->setTop('1');
                    $image->setTop('0');
                    $em->persist($image_top);
                }
                else{
                    $image->setTop('0');
                }
            }
            
            $image->setProduit2($produit_2);
            $em->persist($produit_2);
            $em->persist($image);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success','Images du mannequin modifiées avec succès');
            return $this->redirectToRoute('produit_pro_new_edit3', array('id' => $id));
        }
    }
    /**
     * Forms for pictures add.
     *
     */
    public function motifsFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $libelles = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\Produits_2Type', $produit_2);
        
        return $this->render('FOSUserBundle:Profile:Pro/Produits/addProduits_motifs.html.twig', array(
            'user' => $user,
            'motif' => $produit_2,
            'libelles' => $libelles,
            'form' => $form->createView()
        ));
    }
    
    /**
     * Forms for pictures add.
     *
     */
    public function stocksTaillesFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit_2 = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $libelles = $em->getRepository('KountacBundle:Libelles_motif')->findAll();
        $user = $this->getUser();
        
        return $this->render('FOSUserBundle:Profile:Pro/Produits/addstocks_tailles.html.twig', array(
            'user' => $user,
            'produit_2' => $produit_2,
            'libelles' => $libelles,
        ));
    }
}