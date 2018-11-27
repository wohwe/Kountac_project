<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Kountac\KountacBundle\Entity\Commandes;
use Utilisateurs\UtilisateursBundle\Entity\Mesures;

class CommandeItemController extends Controller
{
    /**
     * Creates a new Commandes entity.
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $user = $this->getUser();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        $commande = new Commandes();
        
        $commande->setDate(new \DateTime('now'));
        $commande->setDateacceptation(new \DateTime('now'));
        $commande->setTerminer(1);
        $commande->setAcheter(0);
        $commande->setCategorie($produit->getCategorie());
        $commande->setMarque($produit->getMarque());
        $commande->setProduit($produit);
        $commande->setContenu($produit->getDescription());
        $commande->setIntitule('Commande'.'.'.$produit->getNom().'.'.$user);
        $commande->setImage($produit->getPicture());
        $commande->setPrixCommande($produit->getEuro()->getPrixCommande());
        $commande->setUtilisateur($this->getUser());
        $commande->setMesures($this->mesuresCommande());
        
        $em->persist($commande);
        $em->flush();
        
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
                $this->get('session')->getFlashBag()->add('success','Commande ajoutée avec succès dans votre panier');
                }
        $session->set('panier', $panier);

        return $this->redirect($this->generateUrl('panier'));
    }

    
    /**
     * Creates a Mesures entity.
     */
    public function newMesuresAction(Request $request, $id)
    {
        $mesure = new Mesures();        
        $mesure->setUtilisateur($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $user = $this->getUser();
        $form_mesure = $this->createForm('Utilisateurs\UtilisateursBundle\Form\MesuresType', $mesure);
        
        if ($request->getMethod() == 'POST') 
        {
            $form_mesure->handleRequest($request);
            if ($form_mesure->isSubmitted() && $form_mesure->isValid()) 
            {
                $em->persist($mesure);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success','Nouvelles mesures ajoutées avec succès');
                return $this->redirectToRoute('commande_mesures_new_item', array('id' => $produit->getId()));
            }
         
        }
        return $this->render('FOSUserBundle:Profile:addMesureCommandeItem.html.twig', array(
            'form_mesure' => $form_mesure->createView(),
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa'),
            'produit' => $produit,
        ));
    }
    
    /**
     * Select a mesure on session.
     */
    public function validationMesureAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        //$session = $this->getRequest()->getSession();
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $this->setMesureOnSession($id);           
        }
        
        //$mesures = $session->get('mesures');
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        $commande = new Commandes();
        
        $commande->setDate(new \DateTime('now'));
        $commande->setDateacceptation(new \DateTime('now'));
        $commande->setTerminer(1);
        $commande->setCategorie($produit->getProduit1()->getCategorie());
        $commande->setUtilisateur($this->getUser());
        $commande->setMarque($produit->getProduit1()->getMarque());
        $commande->setProduit($produit);
        $commande->setContenu($produit->getProduit1()->getDescription());
        $commande->setIntitule('Commande'.'.'.$produit->getProduit1()->getNom().'.'.$user);
        $commande->setImage($produit->getPicture());
        $commande->setPrixCommande($produit->getEuroPrixCommande());
        $commande->setMesures($this->mesuresCommande());
        $commande->setAcheter(0);
        
        $em->persist($commande);
        $em->flush();
        return $this->redirectToRoute('panier');
    }
    
    /**
     * Deletes a mesure entity.
     *
     */
    public function deleteMesuresAction($idMesure, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $mesure = $em->getRepository('UtilisateursBundle:Mesures')->find($idMesure);
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        $em->remove($mesure);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Mesures supprimées avec succès');
        return $this->redirectToRoute('commande_mesures_new_item', array('id' => $produit->getId()));
    }
    
        /**
     * Deletes a Commandes entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('KountacBundle:Commandes')->find($id);
        
        $em->remove($commande);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Commande supprimée avec succès');
        
        return $this->redirectToRoute('panier');
    }
    
    
    public function setMesureOnSession($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('KountacBundle:Produits_2')->find($id);
        
        if (!$session->has('mesure')) 
            $session->set('mesure',array());
        
        $mesures = $session->get('mesures');
        
        if ($this->getRequest()->request->get('mesure') != null)
        {
            $mesures['mesure'] = $this->getRequest()->request->get('mesure');
        } else {
            return $this->redirect($this->generateUrl('commande_new_item', array('id' => $produit->getId())));
        }
        
        $session->set('mesures',$mesures);
        return $this->redirect($this->generateUrl('commande_new_item', array('id' => $produit->getId())));
    }
    
    
    public function mesuresCommande() 
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $mesures = $session->get('mesures');        
        $mesure = array();
        $mesureSession = $em->getRepository('UtilisateursBundle:Mesures')->find($mesures['mesure']);        
        $mesure['mesureCommande'] = array('titulaire' => $mesureSession->getTitulaire(),
                                    'genre' => $mesureSession->getGenre(),
                                    'tp' => $mesureSession->getPoitrine(),
                                    'tt' => $mesureSession->getTaille(),
                                    'tb' => $mesureSession->getBassin(),
                                    'ee' => $mesureSession->getEpaules(),                                    
                                    'ss' => $mesureSession->getSeins(),
                                    'et' => $mesureSession->getEpauletaille(),
                                    'l' => $mesureSession->getLongueur(),
                                    'hp' => $mesureSession->getHauteurPoitrine(),
                                    'dep' => $mesureSession->getDemiEcartPoitrine(),
                                    'tph' => $mesureSession->getTourPetitesHanches(),
                                    'tgh' => $mesureSession->getTourGrandesHanches(),
                                    'dte' => $mesureSession->getdemiTourEncolure(),
                                    'dcdo' => $mesureSession->getDemiCarrureDos(),
                                    'dcde' => $mesureSession->getDemiCarrureDevant(),
                                    'ltdo' => $mesureSession->getTailleDos(),
                                    'ltde' => $mesureSession->getTailleDevant(),
                                    'le' => $mesureSession->getLongueurEpaule(),
                                    'te' => $mesureSession->getTourEmmanchure(),
                                    'hdb' => $mesureSession->getHauteurDessousBras(),
                                    'lb' => $mesureSession->getLongueurBras(),
                                    'gb' => $mesureSession->getGrosseurBras(),
                                    'hc' => $mesureSession->getHauteurCoude(),
                                    'tpo' => $mesureSession->getTourPoignet(),
                                    'hth' => $mesureSession->getHauteurTailleHanche(),
                                    'hm' => $mesureSession->getHauteurMontant(),
                                    'e' => $mesureSession->getEnfourchure(),
                                    'htg' => $mesureSession->getHauteurTailleGenou(),
                                    'htt' => $mesureSession->getHauteurTailleTerre(),
                                    'htct' => $mesureSession->getHauteurTailleCoteTerre()
                )
                ;
        return $mesure;
    }
    
}
