<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompareController extends Controller
{
    public function compareAction()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('compare'))
            $session->set('compare', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('compare')));
        
        return $this->render('KountacBundle:Default:pages/compare.html.twig', array('produits' => $produits,
                                                                                    'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                    'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                    'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                    'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                    'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                    'compare' => $session->get('compare')));
    }
    
    public function compareAsideAction()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('compare'))
            $session->set('compare', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('compare')));
        
        return $this->render('KountacBundle:Menu:compareAside.html.twig', array('produits' => $produits,
                                                                                'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                'compare' => $session->get('compare')));
    }
    
    public function ajoutcompareAction($id) 
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('compare'))
            $session->set('compare', array());
        $compare = $session->get('compare');

        if (array_key_exists($id, $compare)) {
            if ($this->getRequest()->query->get('qte') != null) $compare[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Article déjà dans votre liste de comparaison');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $compare[$id] = $this->getRequest()->query->get('qte');
            else
                $compare[$id] = 1;
            
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès dans votre liste de comparaison');
        }
        $session->set('compare', $compare);

        return $this->redirect($this->generateUrl('compare'));
    }
    
    public function supprimercompareAction($id) 
    {
        $session = $this->getRequest()->getSession();
        $compare = $session->get('compare');
        
        if (array_key_exists($id, $compare))
        {
            unset ($compare[$id]);
            $session->set('compare', $compare);
            $this->get('session')->getFlashBag()->add('success','Article retiré avec succès de votre comparaison ');
        }
       
        return $this->redirect($this->generateUrl('compare'));
    }
    
    public function supprimercompareAsideAction($id) 
    {
        $session = $this->getRequest()->getSession();
        $compare = $session->get('compare');
        
        if (array_key_exists($id, $compare))
        {
            unset ($compare[$id]);
            $session->set('compare', $compare);
            $this->get('session')->getFlashBag()->add('success','Article retiré avec succès de votre comparaison ');
        }
       
        return $this->redirect($this->generateUrl('wishlist'));
    }
    
    public function supprimercompareAside_allAction() 
    {
        $session = $this->getRequest()->getSession();
        $session->remove('compare'); 
        
        $this->get('session')->getFlashBag()->add('success','Tous vos produits ont été retiré avec succès de votre comparaison ');
        
       
        return $this->redirect($this->generateUrl('wishlist'));
    }
}
