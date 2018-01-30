<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        
        $produits = $em->getRepository('KountacBundle:Produits_1')->findAll();        
        $populaires = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopularite();
        $nouveaux = $em->getRepository('KountacBundle:Produits_1')->getProduitsByNouveaute();
        $reductions = $em->getRepository('KountacBundle:Produits_2')->getProduitsByReduction(); 
        $dernieresVentes = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopulariteTime();
        
        if (!$produits) 
            throw $this->createNotFoundException ('La page ou le produit n\'existe pas');
        
        if ($session->has('panier'))
            $panier = $session->get('panier');        
        else
        {
            $panier = false;
            $session->remove('panier');
        }
        
        return $this->render('KountacBundle:Default:index.html.twig', array('produits' => $produits,'user' => $this->getUser(),
                                                                            'populaires' => $populaires,
                                                                            'nouveaux' => $nouveaux,
                                                                            'reductions' => $reductions,
                                                                            'dernieresVentes' => $dernieresVentes,
                                                                            'panier' => $panier,
                                                                            'euro' => $session->get('euro'),
                                                                            'usa' => $session->get('usa'),
                                                                            'livre' => $session->get('livre'),
                                                                            'naira' => $session->get('naira'),
                                                                            'cfa' => $session->get('cfa')));
    }
    
    public function index_euroAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $session->set('euro', '1');
        
        $produits = $em->getRepository('KountacBundle:Produits_1')->findAll();        
        $populaires = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopularite();
        $nouveaux = $em->getRepository('KountacBundle:Produits_1')->getProduitsByNouveaute();
        $reductions = $em->getRepository('KountacBundle:Produits_2')->getProduitsByReduction(); 
        $dernieresVentes = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopulariteTime();
        
        if (!$produits) 
            throw $this->createNotFoundException ('La page ou le produit n\'existe pas');
        
        if ($session->has('panier'))
            $panier = $session->get('panier');        
        else
        {
            $panier = false;
            $session->remove('panier');
        }
        
        return $this->render('KountacBundle:Default:index.html.twig', array('produits' => $produits,'user' => $this->getUser(),
                                                                            'populaires' => $populaires,
                                                                            'nouveaux' => $nouveaux,
                                                                            'reductions' => $reductions,
                                                                            'dernieresVentes' => $dernieresVentes,
                                                                            'panier' => $panier,
                                                                            'euro' => $session->get('euro'),
                                                                            'usa' => $session->get('usa'),
                                                                            'livre' => $session->get('livre'),
                                                                            'naira' => $session->get('naira'),
                                                                            'cfa' => $session->get('cfa')));
    }
}
