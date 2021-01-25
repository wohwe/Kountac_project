<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessagesController extends Controller
{
    public function messagesByUtilisateursAction()
    {
        $em = $this->container->get('doctrine');
        $user = $this->getUser();
        $messages = $em->getRepository('ChatBundle:Message')->getMessagesByUtilisateurs($user);
        
        return $this->render('ChatBundle:Navigation:messagesMenu.html.twig', array('messages' => $messages,'user' => $user));
    }
        
}