<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Kountac\KountacBundle\Form\NewsletterType;

class MenuController extends Controller
{
  
    public function categorieAction()
    {
        $em = $this->container->get('doctrine');
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();
        
        return $this->render('KountacBundle:Menu:categories.html.twig', array('categories' => $categories));
    }
    
    public function categorieAdminAction()
    {
        $em = $this->container->get('doctrine');
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();
        
        return $this->render('KountacBundle:Menu:categoriesAdmin.html.twig', array('categories' => $categories));
    }
    
    public function produitsPopulairesMenuAction()
    {
        $em = $this->container->get('doctrine');
        $produitsPopulaires = $em->getRepository('KountacBundle:Produits_2')->getProduitsByPopulariteMenu();
        
        return $this->render('KountacBundle:Menu:populaires.html.twig', array(  'produitsPopulaires' => $produitsPopulaires,
                                                                                'euro' => $this->getRequest()->getSession()->get('euro'),
                                                                                'livre' => $this->getRequest()->getSession()->get('livre'),
                                                                                'usa' => $this->getRequest()->getSession()->get('usa'),
                                                                                'naira' => $this->getRequest()->getSession()->get('naira'),
                                                                                'cfa' => $this->getRequest()->getSession()->get('cfa')));
    }

    public function categorieMobileAction()
    {
        $em = $this->container->get('doctrine');
        $categories = $em->getRepository('KountacBundle:Categories')->getCategoriesByName();

        return $this->render('KountacBundle:Menu:categoriesMobile.html.twig', array('categories' => $categories));
    }
    
    public function headerLinkAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->container->get('doctrine');
        
        if (!$session->has('souhait'))
            $session->set('souhait', array());
        
        $souhaitProduits = $em->getRepository('KountacBundle:Produits_1')->findArray(array_keys($session->get('souhait')));

        return $this->render('KountacBundle:Menu:headerLink.html.twig', array('souhaitProduits' => $souhaitProduits));
    }
    
    public function usersHeadersAction()
    {
        $user = $this->getUser();
        return $this->render('KountacBundle:Menu:usersHeader.html.twig', array('user' => $user));
    }
    
    public function menuPendingAchatAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();        
        $achat = $session->get('achat');        
           
        return $this->render('FOSUserBundle:Profile:Navigation/menuPendingAchat.html.twig', array('achat'=> $achat,
                                                                                   'user' => $user));
    }
    
    public function menuPanierAction()
    {
        $session = $this->getRequest()->getSession();
        
        if (!$session->has('panier'))
            $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('KountacBundle:Produits_1')->findArray(array_keys($session->get('panier')));
   
        return $this->render('FOSUserBundle:Profile:Navigation/menuPanier.html.twig', array('produits'=> $produits,));
    }
    
    public function menuCollectionFooterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $collections = $em->getRepository('KountacBundle:Collections')->findAll();
        
        return $this->render('KountacBundle:Menu:collectionFooter.html.twig', array('collections' => $collections));
    }
    
    public function newsletterFooterAction(Request $request)
    {
        $form = $this->createForm(new NewsletterType());
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') 
        {
            $email = $form["email"]->getData();
            $comment = \Swift_Message::newInstance()
                ->setSubject('Abonnement newsletter') 
                ->setFrom(array($email))
                ->setTo('ornoirets@gmail.com')
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('UtilisateursBundle:Default:SwiftLayout/newsletter.html.twig',array(
                    'email' => $email,)));
                ;
            $this->get('mailer')->send($comment);
            $this->get('session')->getFlashBag()->add('success','Votre demande d\'abonnement à la newsletter ornoir a envoyé avec succès');
           
            return $this->redirect($this->generateUrl('kountac_homepage'));
           
        }
        
        return $this->render('KountacBundle:Menu:newsletterFooter.html.twig', array('form' => $form->createView()));
    }
    
    public function contactUsFooterAction()
    {
        
        return $this->render('KountacBundle:Menu:contactUsFooter.html.twig');
    }
    
    public function insiderFooterAction()
    {
        
        return $this->render('KountacBundle:Menu:insiderFooter.html.twig');
    }
    
    public function informationFooterAction()
    {
        
        return $this->render('KountacBundle:Menu:informationFooter.html.twig');
    }
}
