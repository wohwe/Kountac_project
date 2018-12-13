<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Kountac\KountacBundle\Entity\Achats;

class AchatController extends Controller
{
    
    public function resumeAchatAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        if (!$session->has('achat')){
            $Achat = new Achats();
        }
        else{
                var_dump($Achat);die();
        
            $Achat = $em->getRepository('KountacBundle:Achats')->find($session->get('achat'));
        }
        
        $Achat->setDate(new \DateTime());
        $Achat->setUtilisateur($this->getUser());
        $Achat->setValider(0);
        $Achat->setEffacer(0);
        $Achat->setReference(0);
        /*
        $session = $this->getRequest()->getSession();
        $session->set('euro', '1');
        */
        if ($session->has('euro')){
            $Achat->setEuro(1);
            $Achat->setAchat($this->facture_euro());
        }
        elseif ($session->has('cfa')){ 
            $Achat->setCfa(1);
            $Achat->setAchat($this->facture_fcfa());
        }
        elseif ($session->has('livre')){ 
            $Achat->setLivre(1);
            $Achat->setAchat($this->facture_livre());
        }
        elseif ($session->has('usa')){ 
            $achat->setUsa(1);
            $achat->setAchat($this->facture_usa());
        }
        elseif ($session->has('all')){
            $Achat->setAll(1);
            $Achat->setAchat($this->facture_all());
        }
        elseif ($session->has('naira')){ 
            $achat->setNaira(1);
            $achat->setAchat($this->facture_naira());
        }
        
        if (!$session->has('achat')) {
            $em->persist($Achat);
            $session->set('achat',$Achat);
        
        }
        $em->persist($Achat); 
        $em->flush();
        
        return $this->render('FOSUserBundle:Profile:resumeAchat.html.twig', array('achat' => $achat,
                                                                                  'commandes' => $commandes,
                                                                                  'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                  'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                  'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                  'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                  'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                  'user' => $user));
    }
    
    /*
     * Cette methode remplace l'api banque.
    */
    public function validationAchatFinalAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $achat = $em->getRepository('KountacBundle:Achats')->find($id);
        $user = $this->getUser();
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit($user);
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        
        foreach($produits as $produit)
        {
            $quantite = $panier[$produit->getId()];            
            $stocknew = $produit->getProduit2()->getProduit1()->getStock() - $quantite;
            $stocknew_motif =  $produit->getProduit2()->getStock() - $quantite;
            $popularite = $produit->getProduit2()->getProduit1()->getPopularite();
            $produit->getProduit2()->getProduit1()->setPopularite($popularite + 1);
            $produit->setStock($produit->getStock() - $quantite);
            $produit->getProduit2()->getProduit1()->setStock($stocknew);
            $produit->getProduit2()->setStock($stocknew_motif);
            $produit->getProduit2()->getProduit1()->setDateachat(new \DateTime());
            foreach($commandes as $commande)
            {
                $commande->setDateachat(new \DateTime());
                $commande->setAcheter(1);
                $em->persist($commande);
                $em->flush();
            }
            
            $em->persist($produit);
            $em->flush();
        }
        
        $achat->setValider(1);
        $achat->setReference($this->container->get('setNewReference')->reference());
        $em->flush();   
        
        $session->remove('panier');
        $session->remove('achat');
        
        //Ici le mail de validation
        $message = \Swift_Message::newInstance()
                ->setSubject('Validation de votre achat')
                ->setFrom(array('ornoirets@gmail.com' => "Kountac"))
                ->setTo($achat->getUtilisateur()->getEmailCanonical())
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('UtilisateursBundle:Default:SwiftLayout/validationAchat.html.twig',array('utilisateur' => $achat->getUtilisateur())));
        
        $this->get('mailer')->send($message);
        
        $this->get('session')->getFlashBag()->add('success','Votre commande a été validée avec succès');
        
        return $this->redirect($this->generateUrl('achat_index'));
    }
    
    /**
     * achat index.
     */
    public function achatIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $listeAchats = $em->getRepository('KountacBundle:Achats')->getFacturebyUser($user);
        
        $achats  = $this->get('knp_paginator')->paginate($listeAchats,$this->get('request')->query->get('page', 1),10);
        
        return $this->render('FOSUserBundle:Profile:listeMesAchats.html.twig', array('achats' => $achats,
                                                                                     'user' => $user));    
    }
    
    /**
     * delete an achat entry.
     */
    public function achatDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $achat = $em->getRepository('KountacBundle:Achats')->find($id);
        
        $achat->setEffacer(1);
        $em->persist($achat);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('success','Commande retirée de votre liste d\'achats avec succès');
        
        return $this->redirectToRoute('achat_index');    
        
    }
    
    /**
     * generate a pdf bill of a command.
     */
    public function facturePDFAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('KountacBundle:Achats')->findOneBy(array('utilisateur' => $this->getUser(),
                                                                              'valider' => 1,
                                                                              'id' => $id));
        if (!$facture) {
            $this->get('session')->getFlashBag()->add('success', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('achat_index'));
        }
        
        $html = $this->renderView('UtilisateursBundle:Default:facture/facturePDF.html.twig', array(
            'facture' => $facture,
            'euro' => $this->getRequest()->getSession()->get('euro'),
            'livre' => $this->getRequest()->getSession()->get('livre'),
            'all' => $this->getRequest()->getSession()->get('all'),
            'usa' => $this->getRequest()->getSession()->get('usa'),
            'naira' => $this->getRequest()->getSession()->get('naira'),
            'cfa' => $this->getRequest()->getSession()->get('cfa')));
        
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('Kountac');
        $html2pdf->pdf->SetTitle('Facture '.$facture->getReference());
        $html2pdf->pdf->SetSubject('Facture Kountac');
        $html2pdf->pdf->SetKeywords('facture,Kountac');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html); 
        $html2pdf->Output("Kountac_facture.pdf");
        
        $response = new Response();
        $response->headers->set('Content-type' , 'application/pdf');
        
        return ($response);
    }
    
    
    public function facture_euro()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getproduit2()->getEuroprix() - ($produit->getproduit2()->getEuroprix() * $produit->getproduit2()->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getproduit2()->getProduit1()->getNom(),
                                                         'motif' => $produit->getproduit2()->getLibelle()->getLibelle(),
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getEuroprixCommande();
            $total_commande += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }
    
    public function facture_all()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        //var_dump($commandes);die();
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getproduit2()->getAllprix() - ($produit->getproduit2()->getAllprix() * $produit->getproduit2()->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getproduit2()->getProduit1()->getNom(),
                                                         'motif' => $produit->getproduit2()->getLibelle()->getLibelle(),
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getAllprixCommande();
            $total_commande += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }

    
    public function facture_livre()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getproduit2()->getLivreprix() - ($produit->getproduit2()->getLivreprix() * $produit->getproduit2()->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getProduit2()->getProduit1()->getNom(),
                                                         'motif' => $produit->getProduit2()->getLibelle()->getLibelle(),
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getLivreprixCommande();
            $total_commande += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'motif' => $commande->getProduit()->getLibelle()->getLibelle(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }
    
    public function facture_usa()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getproduit2()->getUsaprix() - ($produit->getProduit2()->getUsaprix() * $produit->getproduit2()->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getProduit2()->getProduit1()->getNom(),
                                                         'motif' => $produit->getProduit2()->getLibelle()->getLibelle(),                                         
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getUsaprixCommande();
            $total_commande += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'motif' => $commande->getProduit()->getLibelle()->getLibelle(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }
    
    public function facture_naira()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getproduit2()->getNairaprix() - ($produit->getproduit2()->getNairaprix() * $produit->getproduit2()->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getProduit2()->getproduit1()->getNom(),
                                                         'motif' => $produit->getProduit2()->getLibelle()->getLibelle(),
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getNairaprixCommande();
            $total_commande += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'motif' => $commande->getProduit()->getLibelle()->getLibelle(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }
    
    public function facture_fcfa()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        $achat = array();
        $total = 0;
        $total_commande = 0;
        
        $produits = $em->getRepository('KountacBundle:Produits')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getProduit2()->getCfaprix() - ($produit->getProduit2()->getCfaprix() * $produit->getReduction()/100));
            $prix = ($prixReduction * $panier[$produit->getId()]);
            $total += $prix;
            $produit_2 = $produit->getproduit2();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['produit'][$produit->getId()] = array('image' => $image,
                                                         'reference' => $produit->getProduit2()->getproduit1()->getNom(),
                                                         'motif' => $produit->getProduit2()->getLibelle()->getLibelle(),
                                                         'quantite' => $panier[$produit->getId()],
                                                         'prix' => round($prixReduction,2),
                                                            );
        }  
        
        foreach($commandes as $commande)
        {
            $prix_commande = $commande->getProduit()->getCfaprixCommande();
            $total += $prix_commande;
            $produit_2 = $commande->getproduit();
            $image = $em->getRepository('KountacBundle:Media_motif')->findOneBy(array('produit_2' => $produit_2, 'top' => 0));
            $achat['commande'][$commande->getId()] = array('image' => $image,
                                                           'reference' => $commande->getproduit()->getproduit1()->getNom(),
                                                           'motif' => $commande->getProduit()->getLibelle()->getLibelle(),
                                                           'prix' => round($prix_commande,2),
                                                            );
        }
        
        $achat['livraison'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['facturation'] = array('prenom' => $user->getPrenom(),
                                    'nom' => $user->getNom(),
                                    'email' => $user->getEmail(),
                                    'telephone' => $user->getTelephone(),
                                    'telephonefix' => $user->getTelephonefix(),                                    
                                    'adresse' => $user->getAdresse(),
                                    'cp' => $user->getCp(),
                                    'ville' => $user->getVille(),
                                    'pays' => $user->getPays(),
                                    'Rue' => $user->getRue());

        $achat['prix'] = round($total,2);
        $achat['prixCommande'] = round($total_commande,2);
        $achat['token'] = bin2hex($generator->nextBytes(20));
        return $achat;
    }
}