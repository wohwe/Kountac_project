<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Kountac\KountacBundle\Entity\Achats;
use Kountac\KountacBundle\Entity\ServiceLivraison;
use \DOMDocument;

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
            //var_dump($session->get('achat'));die();
            $Achat = new Achats();
            //$Achat = $em->getRepository('KountacBundle:Achats')->find($session->get('achat'));
            
        }
        
        $Achat->setDate(new \DateTime());
        $Achat->setUtilisateur($this->getUser());
        //$Achat->setUtilisateur(17);
        //$Achat->setEuro(1);
        $Achat->setValider(0);
        $Achat->setEffacer(0);
        $Achat->setReference(0);
        $prixCmd = $Achat->getAchat()["prix"];
        
        if ($session->has('euro')){
            $Achat->setEuro(1);
            $Achat->setAchat($this->facture_euro());
        }
        elseif ($session->has('cfa')){ 
            $Achat->setCfa(1);
            $Achat->setAchat($this->facture_fcfa());
            $prixCmd = round($Achat->getAchat()["prix"] / 655.81);
        }
        elseif ($session->has('livre')){ 
            $Achat->setLivre(1);
            $Achat->setAchat($this->facture_livre());
            $prixCmd = round($Achat->getAchat()["prix"] / 0.879);
        }
        elseif ($session->has('usa')){ 
            $Achat->setUsa(1);
            $Achat->setAchat($this->facture_usa());
            $prixCmd = round($Achat->getAchat()["prix"] / 1.124);
        }
        elseif ($session->has('all')){
            $Achat->setAll(1);
            $Achat->setAchat($this->facture_all());
        }
        elseif ($session->has('naira')){ 
            $Achat->setNaira(1);
            $Achat->setAchat($this->facture_naira());
            $prixCmd = round($Achat->getAchat()["prix"] / 406.448);
        }
        
        if (!$session->has('achat')) {
            $em->persist($Achat);
            $session->set('achat',$Achat);
        
        }

        $mailCmd = $Achat->getAchat()["facturation"]["email"];
        /*var_dump($Achat->getAchat()["prix"] );*/
        $em->persist($Achat); 
        $em->flush();


        /*$em2 = $this->getDoctrine()->getManager();
        $livraison = new ServiceLivraison();
        $livraison->setNom("MELI");
        $em2->persist($livraison); 
        $em2->flush();*/






// --------------- VARIABLES A MODIFIER ---------------

$jour = "";

if (date("j")<10) {
    $jour = "0".date("j");
}else{
    $jour = date("j");
}
$dateReal = date("Y")."-".date("m")."-".$jour;
$heureReal = date("H").":".date("i").":".date("s");




// Ennonciation de variables
$pbx_site = '2066365';                                  //variable de test 1999888
$pbx_rang = '01';                                   //variable de test 32
$pbx_identifiant = '940881839';             //variable de test 3
$pbx_cmd = $Achat->getId().date("Y").date("m").$jour." ".$heureReal; //variable de test cmd_test1
$pbx_porteur = $mailCmd;                         //variable de test test@test.fr
$pbx_total = $prixCmd.".00";                                 //variable de test 100
// Suppression des points ou virgules dans le montant                       
    $pbx_total = str_replace(",", "", $pbx_total);
    $pbx_total = str_replace(".", "", $pbx_total);

// Paramétrage des urls de redirection après paiement
$pbx_effectue = 'http://kountac.fr/profile/achat/api/banque_'.$Achat->getId();
$pbx_annule = 'http://kountac.fr/profile/achat/resume';
$pbx_refuse = 'http://kountac.fr/profile/achat/resume';
// Paramétrage de l'url de retour back office site
$pbx_repondre_a = 'http://kountac.fr/profile/achat/resume';
// Paramétrage du retour back office site
$pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';

// Connection à la base de données
// mysql_connect...
// On récupère la clé secrète HMAC (stockée dans une base de données par exemple) et que l’on renseigne dans la variable $keyTest;
//$keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
$keyTest = 'B2AB4B6512C9EEA8118C3FE84139094A8C6BC3AAB3BD4664F2DB2E7A8D87F949BDE04D8351327560340AD263FB557950C97E53876AE6234B0D58E3F171612731';



// --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------

$serveurs = array('tpeweb.paybox.com', //serveur primaire
'tpeweb.paybox.com'); //serveur secondaire
$serveurOK = "";
//phpinfo(); <== voir paybox
foreach($serveurs as $serveur){
$doc = new DOMDocument();
$doc->loadHTMLFile('https://'.$serveur.'/load.html');
$server_status = "";
$element = $doc->getElementById('server_status');
if($element){
$server_status = $element->textContent;}
if($server_status == "OK"){
// Le serveur est prêt et les services opérationnels
$serveurOK = $serveur;
break;}
// else : La machine est disponible mais les services ne le sont pas.
}
//curl_close($ch); <== voir paybox
if(!$serveurOK){
die("Erreur : Aucun serveur n'a été trouvé");}
// Activation de l'univers de préproduction
//$serveurOK = 'preprod-tpeweb.paybox.com';

//Création de l'url cgi paybox
$serveurOK = 'https://'.$serveurOK.'/cgi/MYchoix_pagepaiement.cgi';
// echo $serveurOK;



// --------------- TRAITEMENT DES VARIABLES ---------------

// On récupère la date au format ISO-8601
$dateTime = date("c");

// On crée la chaîne à hacher sans URLencodage
$msg = "PBX_SITE=".$pbx_site.
"&PBX_RANG=".$pbx_rang.
"&PBX_IDENTIFIANT=".$pbx_identifiant.
"&PBX_TOTAL=".$pbx_total.
"&PBX_DEVISE=978".
"&PBX_CMD=".$pbx_cmd.
"&PBX_PORTEUR=".$pbx_porteur.
"&PBX_REPONDRE_A=".$pbx_repondre_a.
"&PBX_RETOUR=".$pbx_retour.
"&PBX_EFFECTUE=".$pbx_effectue.
"&PBX_ANNULE=".$pbx_annule.
"&PBX_REFUSE=".$pbx_refuse.
"&PBX_HASH=SHA512".
"&PBX_TIME=".$dateTime;
//echo $msg;

// Si la clé est en ASCII, On la transforme en binaire
$binKey = pack("H*", $keyTest);

// On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et //
// la clé binaire
// On envoi via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
// Pour afficher la liste des algorithmes disponibles sur votre environnement, décommentez la ligne //
// suivante
// print_r(hash_algos());
$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

// La chaîne sera envoyée en majuscule, d'où l'utilisation de strtoupper()
// On crée le formulaire à envoyer
// ATTENTION : l'ordre des champs est extrêmement important, il doit
// correspondre exactement à l'ordre des champs dans la chaîne hachée










        
        return $this->render('FOSUserBundle:Profile:resumeAchat.html.twig', array('achat' => $Achat,
                                                                                  'commandes' => $commandes,
                                                                                  'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                  'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                  'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                  'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                  'cfa' => $this->getRequest()->getSession()->get('cfa'),
                                                                                  'user' => $user,
                                                                'serveurOK' => $serveurOK,
                                                                'pbx_site' => $pbx_site,
                                                                'pbx_rang' => $pbx_rang,
                                                                'pbx_identifiant' => $pbx_identifiant,
                                                                'pbx_total' => $pbx_total,
                                                                'pbx_cmd' => $pbx_cmd,
                                                                'pbx_porteur' => $pbx_porteur,
                                                                'pbx_repondre_a' => $pbx_repondre_a,
                                                                'pbx_retour' => $pbx_retour,
                                                                'pbx_effectue' => $pbx_effectue,
                                                                'pbx_annule' => $pbx_annule,
                                                                'pbx_refuse' => $pbx_refuse,
                                                                'dateTime' => $dateTime,
                                                                'hmac' => $hmac));
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
        
        $produits = $em->getRepository('KountacBundle:Produits_3')->findArray(array_keys($session->get('panier')));
        $commandes = $em->getRepository('KountacBundle:Commandes')->getCommandesByUser_produit_acheter($user);
        
        foreach($produits as $produit)
        {
            $prixReduction = ($produit->getProduit2()->getCfaprix() - ($produit->getProduit2()->getCfaprix() * $produit->getProduit2()->getReduction()/100));
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