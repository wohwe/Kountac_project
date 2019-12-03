<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kountac\KountacBundle\Entity\ServiceLivraison;
use Kountac\KountacBundle\Entity\ServicePaiement;

use Symfony\Component\HttpFoundation\Request;

class CheckoutController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Utilisateurs\UtilisateursBundle\Form\AdressCheckoutType', $user);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('Checkout_index2');
        }

        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier'))
            $session->set('panier', array());
           
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        
        return $this->render('UtilisateursBundle:Checkout:checkout1.html.twig',array('user' => $user,
                                                                                    'produits' => $produits,
                                                                                    'commandes' => $commandes,
                                                                                    'all' => $this->getRequest()->getSession()->get('all'),
                                                                                    'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                    'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                    'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                    'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                    'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                    'form' => $editForm->createView(),
                                                                                    'panier' => $session->get('panier'),
        ));    
    }
    
    public function index2Action(Request $request)
    {
        $user = $this->getUser();   
        $servicePaiement = $user->getServicePaiement();
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $session = $this->getRequest()->getSession();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        if ($servicePaiement==NULL)
            $servicePaiement = new ServicePaiement();
        
        $form = $this->createForm('Utilisateurs\UtilisateursBundle\Form\PaiementFullCheckoutType');
        
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {
            if ($form->isSubmitted() && $form->isValid()) {
                if (!$session->has('paiement')) 
                    $session->set('paiement',array());

                if (!$session->has('panier'))
                    $session->set('panier', array());
                
                $paimentDetails = array();
                
                $nomPaiement = $form['nom']->getData();
                
                $paimentDetails['nom'] = $nomPaiement;
                
                $session->set('paiement',$paimentDetails);
                $servicePaiement->setNom($nomPaiement);
                $user->setServicePaiement($servicePaiement);   
                
                $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
                $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
                $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
                $editForm = $this->createForm('Utilisateurs\UtilisateursBundle\Form\AdressCheckoutType', $user);
                $editForm->handleRequest($request);
                
                $em->persist($servicePaiement);
                $em->persist($user);
                $em->flush();


                //echo $nomPaiement; die();
                
                /*return $this->render('UtilisateursBundle:Checkout:checkout4.html.twig',array('user' => $user,'images' => $images,
                                                                                        'paiement' => $this->getRequest()->getSession()->get('paiement'),
                                                                                        'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                        'all' => $this->getRequest()->getSession()->get('all'),
                                                                                        'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                        'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                        'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                        'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                        'produits' => $produits,
                                                                                        'commandes' => $commandes,
                                                                                        'form' => $editForm->createView(),
                                                                                        'panier' => $session->get('panier')
        ));*/

            return $this->redirectToRoute('resume_achat');

            }
        }
         
        if (!$session->has('panier'))
            $session->set('panier', array());
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        
        return $this->render('UtilisateursBundle:Checkout:checkout3.html.twig',array('user' => $user,'images' => $images,
                                                                                     'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                     'all' => $this->getRequest()->getSession()->get('all'),
                                                                                     'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                     'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                     'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                     'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                     'produits' => $produits,
                                                                                     'commandes' => $commandes,
                                                                                     'form' => $form->createView(),
                                                                                     'panier' => $session->get('panier')
        ));    
    }
    
    public function index4Action(Request $request)
    {
        $user = $this->getUser();
        $editForm = $this->createForm('Utilisateurs\UtilisateursBundle\Form\AdressCheckoutType', $user);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier'))
            $session->set('panier', array());
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));

        return $this->render('UtilisateursBundle:Checkout:checkout4.html.twig',array('user' => $user,'images' => $images,
                                                                                     'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                     'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                     'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                     'all' => $this->getRequest()->getSession()->get('all'),
                                                                                     'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                     'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                     'paiement' => $this->getRequest()->getSession()->get('paiement'),
                                                                                     'produits' => $produits,
                                                                                     'commandes' => $commandes,
                                                                                     'form' => $editForm->createView(),
                                                                                     'panier' => $session->get('panier')
        ));    
    }
}
