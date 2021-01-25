<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WishlistController extends Controller
{
    public function wishlistAction()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('souhait'))
            $session->set('souhait', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('souhait')));

        return $this->render('KountacBundle:Default:pages/wishlist.html.twig', array('produits' => $produits,
                                                                                     'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                        'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                        'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                        'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                        'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                     'souhait' => $session->get('souhait')));
    }
    
    public function ajoutwishlistAction($id) 
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('souhait'))
            $session->set('souhait', array());
        $souhait = $session->get('souhait');

        if (array_key_exists($id, $souhait)) {
            if ($this->getRequest()->query->get('qte') != null) $souhait[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Article déjà dans vos souhaits');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $souhait[$id] = $this->getRequest()->query->get('qte');
            else
                $souhait[$id] = 1;
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès dans vos souhaits');
        }
        $session->set('souhait', $souhait);

        return $this->redirect($this->generateUrl('wishlist'));
    }
    
    public function ajoutToutpanierAction() 
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('KountacBundle:Produits_1')->findArray(array_keys($session->get('souhait')));

        foreach($produits as $produit)
        {
            if (!$session->has('panier'))
                $session->set('panier', array());
            $panier = $session->get('panier');
            $id = $produit->getId();
            
            if (array_key_exists($id, $panier)) 
            {
                if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            }
            else 
            {
                if ($this->getRequest()->query->get('qte') != null)
                    $panier[$id] = $this->getRequest()->query->get('qte');
                else
                    $panier[$id] = 1;

            }
            $session->set('panier', $panier);
        }
        $session->remove('souhait');
        $this->get('session')->getFlashBag()->add('success','Tous vos souhaits ont été ajouté avec succès dans votre panier');
            
        return $this->redirect($this->generateUrl('panier'));
    }
    
    public function supprimerwishlistAction($id) 
    {
        $session = $this->getRequest()->getSession();
        $souhait = $session->get('souhait');
        
        if (array_key_exists($id, $souhait))
        {
            unset ($souhait[$id]);
            $session->set('souhait', $souhait);
            $this->get('session')->getFlashBag()->add('success','Article retiré avec succès de vos souhaits ');
        }
       
        return $this->redirect($this->generateUrl('wishlist'));
    }
}
