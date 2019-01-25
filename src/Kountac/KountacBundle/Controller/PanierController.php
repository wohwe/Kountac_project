<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    public function panierAction()
    {
        $session = $this->getRequest()->getSession();
        $user = $this->getUser();
        if (!$session->has('panier'))
            $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        return $this->render('KountacBundle:Default:pages/panier.html.twig', array('produits' => $produits,
                                                                                   'commandes' => $commandes,          
                                                                                   'user'  => $user,
                                                                                   'images'  => $images,
                                                                                   'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                   'all' => $this->getRequest()->getSession()->get('all'),
                                                                                   'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                   'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                   'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                   'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                   'panier' => $session->get('panier')));
    }
    
    public function panierMenuAction()
    {
        $session = $this->getRequest()->getSession();
        $user = $this->getUser();
        if (!$session->has('panier'))
            $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        return $this->render('KountacBundle:Menu:panierMenu.html.twig', array('produits' => $produits,
                                                                              'commandes' => $commandes,
                                                                              'images' => $images,
                                                                              'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                              'all' => $this->getRequest()->getSession()->get('all'),
                                                                              'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                              'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                              'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                              'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                              'panier' => $session->get('panier')));
    }
    
    public function panierMenuAllProductsAction()
    {
        $session = $this->getRequest()->getSession();
        $user = $this->getUser();
        if (!$session->has('panier'))
            $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        
        return $this->render('KountacBundle:Menu:panierMenuAllProducts.html.twig', array('produits' => $produits,
                                                                              'commandes' => $commandes,
                                                                              'images' => $images,
                                                                              'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                'all' => $this->getRequest()->getSession()->get('all'),
                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                              'panier' => $session->get('panier')));
    }
    
    public function ajoutpanierAction($id) 
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('panier'))
            $session->set('panier', array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            else
                $panier[$id] = 1;
            
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès dans votre panier');
        }
        $session->set('panier', $panier);

        return $this->redirect($this->generateUrl('panier'));
    }
    
    public function supprimerpanierAction($id) 
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        if (array_key_exists($id, $panier))
        {
            unset ($panier[$id]);
            $session->set('panier', $panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
       
        return $this->redirect($this->generateUrl('panier'));
    }
}
