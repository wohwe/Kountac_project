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
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $serviceLivraison = $user->getServiceLivraison();
        
        if (!$session->has('panier'))
            $session->set('panier', array());

        if (!$serviceLivraison)
            $serviceLivraison = new ServiceLivraison();
        
        $form = $this->createForm('Utilisateurs\UtilisateursBundle\Form\LivraisonCheckoutType', $serviceLivraison);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setServiceLivraison($serviceLivraison);        
            $em = $this->getDoctrine()->getManager();
            $em->persist($serviceLivraison);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('Checkout_index3');
        }

        return $this->render('UtilisateursBundle:Checkout:checkout2.html.twig',array(   'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                        'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                        'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                        'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                        'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                        'user' => $user,
                                                                                        'produits' => $produits,
                                                                                        'commandes' => $commandes,
                                                                                        'form' => $form->createView(),
                                                                                        'panier' => $session->get('panier'),
        ));    
    }
    
    public function index3Action(Request $request)
    {
        $user = $this->getUser();   
        $servicePaiement = $user->getServicePaiement();
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        if ($servicePaiement==NULL)
            $servicePaiement = new ServicePaiement();
        
        $form = $this->createForm('Utilisateurs\UtilisateursBundle\Form\PaiementCheckoutType');
        
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {
            if ($form->isSubmitted() && $form->isValid()) {
                $user->setServicePaiement($servicePaiement);        
                $em = $this->getDoctrine()->getManager();
                $em->persist($servicePaiement);
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('Checkout_index4');
            }
        }
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier'))
            $session->set('panier', array());
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        
        return $this->render('UtilisateursBundle:Checkout:checkout3.html.twig',array('user' => $user,
                                                                                     'euro' => $this->getRequest()->getSession()->get('euro'),
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
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier'))
            $session->set('panier', array());
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));

        return $this->render('UtilisateursBundle:Checkout:checkout4.html.twig',array('user' => $user,
                                                                                     'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                        'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                        'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                        'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                        'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                     'produits' => $produits,
                                                                                     'commandes' => $commandes,
                                                                                     'form' => $editForm->createView(),
                                                                                     'panier' => $session->get('panier')
        ));    
    }
}