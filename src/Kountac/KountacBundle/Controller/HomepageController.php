<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DOMDocument;

class HomepageController extends Controller
{

    public function localisationAction()
    {
        /* Code for Geolocalisation by ChrisME */
        $pays = "";
        $ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
        //var_dump($query);
        if($query && $query['status'] == 'success') 
        {
            //code avec les variables
            //echo "Bonjour visiteur de " . $query['country'] . "," . $query['city'];
            $pays = $query['country'];
        }








        // --------------- VARIABLES A MODIFIER ---------------

// Ennonciation de variables
$pbx_site = '2066365';                                  //variable de test 1999888
$pbx_rang = '01';                                   //variable de test 32
$pbx_identifiant = '940881839';             //variable de test 3
$pbx_cmd = 'Test00001';                             //variable de test cmd_test1
$pbx_porteur = 'christianmeli81@gmail.com';                         //variable de test test@test.fr
$pbx_total = '100';                                 //variable de test 100
// Suppression des points ou virgules dans le montant                       
    $pbx_total = str_replace(",", "", $pbx_total);
    $pbx_total = str_replace(".", "", $pbx_total);

// Paramétrage des urls de redirection après paiement
$pbx_effectue = 'http://localhost/Kit_E-transactions_internet_premium_PHP/Exemple.php/accepte.php';
$pbx_annule = 'http://localhost/Kit_E-transactions_internet_premium_PHP/Exemple.php/annule.php';
$pbx_refuse = 'http://localhost/Kit_E-transactions_internet_premium_PHP/Exemple.php/refuse.php';
// Paramétrage de l'url de retour back office site
$pbx_repondre_a = 'http://localhost/Kit_E-transactions_internet_premium_PHP/Exemple.php/';
// Paramétrage du retour back office site
$pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';

// Connection à la base de données
// mysql_connect...
// On récupère la clé secrète HMAC (stockée dans une base de données par exemple) et que l’on renseigne dans la variable $keyTest;
//$keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
$keyTest = 'A7AD3604D4F02B3764357ECCB9CCF7B4C0856554801AE2F3CD7817404B1156CD81F5D5EC4D79BFE7DAE8B56CA918422CBC892DF6A54D853D739FCEEFE06106FA';



// --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------

$serveurs = array('tpeweb.paybox.com', //serveur primaire
'tpeweb1.paybox.com'); //serveur secondaire
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







        //return $this->render('KountacBundle:Default:localisation.html.twig', array('pays' => $pays));
        return $this->render('KountacBundle:Default:localisation.html.twig', 
            array('serveurOK' => $serveurOK,
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

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        
        //$produits = $em->getRepository('KountacBundle:Produits_1')->findAll(); 
        $produits = $em->getRepository('KountacBundle:Produits_1')->findBy([], ['id' => 'DESC']);        
        $images = $em->getRepository('KountacBundle:Media_motif')->findAll();        
        $mannequins = $em->getRepository('KountacBundle:Mannequin')->findAll();        
        $populaires = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopularite();
        $nouveaux = $em->getRepository('KountacBundle:Produits_1')->getProduitsByNouveaute();
        $reductions = $em->getRepository('KountacBundle:Produits_2')->getProduitsByReduction(); 
        $dernieresVentes = $em->getRepository('KountacBundle:Produits_1')->getProduitsByPopulariteTime();
        $produitsCategorie = $em->getRepository('KountacBundle:Produits_2')->findAll();
        $produits2  = $this->get('knp_paginator')->paginate($produitsCategorie, $this->get('request')->query->get('page', 1),32);
        
        if ($session->has('panier'))
            $panier = $session->get('panier');        
        else
        {
            $panier = false;
            $session->remove('panier');
        }


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $produitsCategorie, /* query NOT result */
            $this->get('request')->query->getInt('page', 1)/*page number*/,
            24/*limit per page*/
        );

        /* Code for Geolocalisation by ChrisME */
        $pays = "";
        $ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
        //var_dump($query);
        if($query && $query['status'] == 'success') 
        {
            //code avec les variables
            //echo "Bonjour visiteur de " . $query['country'] . "," . $query['city'];
            $pays = $query['country'];
        }

        if($pays == "France")
        {
            $session->set('euro', '1');
        
            if ($session->has('cfa'))
                $session->remove('cfa');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('naira'))
                $session->remove('naira');

        } else if($pays == "Germany")
        {
            $session->set('all', '1');
        
            if ($session->has('cfa'))
                $session->remove('cfa');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('euro'))
                $session->remove('euro');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('naira'))
                $session->remove('naira');

        } else if($pays == "United Kingdom")
        {
            $session->set('livre', '1');
        
            if ($session->has('euro'))
                $session->remove('euro');
            
            if ($session->has('cfa'))
                $session->remove('cfa');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('naira'))
                $session->remove('naira');
                
        } else if($pays == "Cameroon")
        {
            $session->set('cfa', '1');
        
            if ($session->has('euro'))
                $session->remove('euro');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('naira'))
                $session->remove('naira');
                
        } else if($pays == "United states")
        {
            $session->set('usa', '1');
        
            if ($session->has('euro'))
                $session->remove('euro');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('cfa'))
                $session->remove('cfa');
            
            if ($session->has('naira'))
                $session->remove('naira');

        } else if($pays == "Nigeria")
        {
            $session->set('naira', '1');
        
            if ($session->has('euro'))
                $session->remove('euro');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('cfa'))
                $session->remove('cfa');

        }else
        {
            $session->set('euro', '1');
        
            if ($session->has('cfa'))
                $session->remove('cfa');
            
            if ($session->has('livre'))
                $session->remove('livre');
            
            if ($session->has('all'))
                $session->remove('all');
            
            if ($session->has('usa'))
                $session->remove('usa');
            
            if ($session->has('naira'))
                $session->remove('naira');
        }




        //var_dump($produits2);die();
        return $this->render('KountacBundle:Default:index2.html.twig', array('produits' => $produits,'user' => $this->getUser(),
                                                                            'populaires' => $populaires,
                                                                            'nouveaux' => $nouveaux,
                                                                            'images' => $images,
                                                                            'mannequins' => $mannequins,
                                                                            'reductions' => $reductions,
                                                                            'produits2' => $produits2,
                                                                            'dernieresVentes' => $dernieresVentes,
                                                                            'panier' => $panier,
                                                                            'euro' => $session->get('euro'),
                                                                            'all' => $session->get('all'),
                                                                            'usa' => $session->get('usa'),
                                                                            'livre' => $session->get('livre'),
                                                                            'naira' => $session->get('naira'),
                                                                            'pagination' => $pagination,
                                                                            'cfa' => $session->get('cfa')));
    }
    
    public function index_pays_selectionAction()
    {
        $session = $this->getRequest()->getSession();
        //$session->set('euro', '1');
        
        $produits = $this->getDoctrine()->getManager()->getRepository('KountacBundle:Produits_1')->findAll();        
        $user = $this->getUser();
        
        if ($user != NULL)
            return $this->redirectToRoute('kountac_homepage');
        
        if (!$produits) 
            throw $this->createNotFoundException ('La page ou le produit n\'existe pas');
        
        return $this->render('KountacBundle:Default:index.html.twig', array('euro' => $session->get('euro'),
                                                                            'all' => $session->get('all'),
                                                                            'usa' => $session->get('usa'),
                                                                            'livre' => $session->get('livre'),
                                                                            'naira' => $session->get('naira'),
                                                                            'cfa' => $session->get('cfa')));
    }



    /* Function add by ChrisME */

    public function productsListAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('KountacBundle:Default:index2.html.twig', array('pagination' => $pagination));
    }
}
