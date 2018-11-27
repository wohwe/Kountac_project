<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Kountac\ChatBundle\Entity\Message;

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