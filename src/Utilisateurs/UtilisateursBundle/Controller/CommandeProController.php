<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Kountac\KountacBundle\Entity\SousAchats;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Kountac\KountacBundle\Entity\Commandes;

use \DateTime;

class CommandeProController extends Controller
{
    /**
     * List of commands.
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesCommandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByPro($user);
        
        $commandes  = $this->get('knp_paginator')->paginate($listesCommandes,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesCommande.html.twig', array(
            'commandes' => $commandes,
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }

    /**
     * List of sous achat.
     */
    public function sousAchatAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesCommandes = $em->getRepository('KountacBundle:SousAchats')->getAchatsByIdUser($user->getId());

        //var_dump($listesCommandes);

        $currentDate = date("d/m/Y");

        $this->get('session')->set('currentDate',$currentDate);
        
        $commandes  = $this->get('knp_paginator')->paginate($listesCommandes,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/listeMesSousAchat.html.twig', array(
            'commandes' => $commandes,
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }

    /**
     * List of sous achat.
     */
    public function sousAchatByIdAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $listesCommandes = $em->getRepository('KountacBundle:SousAchats')->getAchatsById($id);

        //var_dump($listesCommandes);
        $currentDate = date("d/m/Y");

        $probaDate = new DateTime();
        $probaDate->setDate(date('Y'), date('m'), date('d'));

        $newDate = $probaDate->modify('+1 days');

        $this->get('session')->set('currentDate',$currentDate);
        $this->get('session')->set('deliveryDate',$newDate);
        
        $commandes  = $this->get('knp_paginator')->paginate($listesCommandes,$this->get('request')->query->get('page', 1),10);
        return $this->render('FOSUserBundle:Profile:Pro/ListeMesSousAchatDetails.html.twig', array(
            'commandes' => $commandes,
            'user' => $user,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }

    /**
     * Accept of sous achat.
     */
    public function accepterSousAchatAction(SousAchats $sousAchat)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $sousAchat->setAccepter(1);
        $sousAchat->setStatut("Accepter");
        $em->persist($sousAchat);
        $em->flush();

        //Ici le mail de validation
        $message = \Swift_Message::newInstance()
                ->setSubject('Commandes acceptées')
                ->setFrom(array('contact@kountac.fr' => "Kountac"))
                ->setTo($sousAchat->getUtilisateur()->getEmailCanonical())
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('UtilisateursBundle:Default:SwiftLayout/validationSousAchat.html.twig',array('utilisateur' => $sousAchat->getUtilisateur())));
        
        $this->get('mailer')->send($message);

        $currentDate = date("d/m/Y");

        $this->get('session')->set('currentDate',$currentDate);

        $this->get('session')->getFlashBag()->add('success','Vous avez accepté la commande');
        
        return $this->redirectToRoute('details_sous_achat', array('id' => $sousAchat->getId()));
    }

    /**
     * Livraison of sous achat.
     */
    public function livraisonSousAchatAction(SousAchats $sousAchat)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $sousAchat->setLivraison(1);
        $em->persist($sousAchat);
        $em->flush();


        $currentDate = date("d/m/Y");

        $this->get('session')->set('currentDate',$currentDate);

        return new Response('ok');
        
        //return $this->redirectToRoute('details_sous_achat', array('id' => $sousAchat->getId()));
    }

    /**
     * Livraison of sous achat.
     */
    public function disableLivraisonSousAchatAction(SousAchats $sousAchat)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $sousAchat->setLivraison(0);
        $em->persist($sousAchat);
        $em->flush();


        $currentDate = date("d/m/Y");

        $this->get('session')->set('currentDate',$currentDate);

        return new Response('ok');
        
        //return $this->redirectToRoute('details_sous_achat', array('id' => $sousAchat->getId()));
    }

    /**
     * Livraison of sous achat.
     */
    public function delaiLivraisonSousAchatAction(/*SousAchats $sousAchat, */$nbr)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        /*$sousAchat->setLivraison(0);
        $em->persist($sousAchat);
        $em->flush();*/


        $currentDate = date("d/m/Y");

        $probaDate = new DateTime();
        $probaDate->setDate(date('Y'), date('m'), date('d'));

        $newDate = $probaDate->modify('+'.$nbr.' days');

        $this->get('session')->set('currentDate',$currentDate);
        $this->get('session')->set('deliveryDate',$newDate);

        return new Response($newDate->format("d/m/Y"));
        
    }
    
    
    public function showAction(Request $request, Commandes $commande)
    {
        $user = $this->getUser();
        $form = $this->createForm('Kountac\KountacBundle\Form\CommandesAddPriceType');
        $session = $this->getRequest()->getSession();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $prix = $form['prixCommande']->getData();
                
                if ($session->has('euro')){
                        $commande->getProduit()->setEuroprixCommande($prix);
                        $commande->setPrixCommande($prix);
                    }
                elseif ($session->has('cfa')){ 
                    $commande->getProduit()->setCfaprixCommande($prix);
                    $commande->setPrixCommande($prix);
                }
                elseif ($session->has('usa')){ 
                    $commande->getProduit()->setUsaprixCommande($prix);
                    $commande->setPrixCommande($prix);
                }
                elseif ($session->has('livre')){ 
                    $commande->getProduit()->setLivreprixCommande($prix);
                    $commande->setPrixCommande($prix);
                }
                elseif ($session->has('naira')){ 
                    $commande->getProduit()->setNairaprixCommande($prix);
                    $commande->setPrixCommande($prix);
                }
                
                $commande->setDateacceptation(new \DateTime('now'));
                $commande->setTerminer(1);
                $commande->setMarque($user);
                $em->persist($commande);
                $em->flush();

                return $this->redirectToRoute('commande_pro_show', array('id' => $commande->getId()));
            }
        }
        return $this->render('FOSUserBundle:Profile:Pro/ShowCommande.html.twig', array(
            'commande' => $commande,
            'user' => $user,
            'form' => $form->createView(),
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')
        ));
    }
    
    /**
     * Set as sent a Command.
     *
     */
    public function envoyerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('KountacBundle:Commandes')->find($id);
        
        $commande->setEnvoyer(1);
        $commande->setDateenvoi(new \DateTime('now'));
        
        $em->persist($commande);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Votre commande a bien été enregistrée comme étant envoyée au client, attente de la confirmation du client');
        
        return $this->redirectToRoute('commande_pro_show', array('id' => $commande->getId()));
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
        
        $this->get('session')->getFlashBag()->add('success','Commande supprimée avec succès de votre liste');
        
        return $this->redirectToRoute('commande_pro_index');
    }
}
