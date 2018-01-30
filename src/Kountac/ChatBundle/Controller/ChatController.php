<?php

namespace Kountac\ChatBundle\Controller;

use Kountac\ChatBundle\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/chat")
 */
class ChatController extends Controller
{
    /**
     * @return Response
     *
     * @Route("/{channel}", name="cunningsoft_chat_show", defaults={"channel" = "default"})
     * @Template
     */
    public function showAction($channel)
    {
        return array(
            //'updateInterval' => $this->container->getParameter('cunningsoft_chat.update_interval'),
            'channel' => $channel
        );
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @Route("/post/{channel}", name="cunningsoft_chat_post", defaults={"channel" = "default"})
     */
    public function postAction(Request $request, $channel)
    {
		
        $message = new Message();
		$id_marque=$request->get('marque_id');
        $message->setAuthor($this->getUser());
        $message->setChannel($channel);
        $message->setMessage($request->get('message'));
        $message->setInsertDate(new \DateTime('now'));
		$userManager = $this->get('fos_user.user_manager');
		
		$user = $userManager->findUserBy(array('id' =>$id_marque));
		$message->setRecepteur($user);
        $this->getDoctrine()->getManager()->persist($message);
        $this->getDoctrine()->getManager()->flush();

        return new Response('Successful');
	
    }

    /**
     * @Route("/list/{channel}", name="cunningsoft_chat_list", defaults={"channel" = "default"})
     * @Template
     */
    public function listAction(Request $request, $channel)
    {
		$id_recept=$request->get('marque_id');
		$userManager = $this->get('fos_user.user_manager');
		
		$usere = $userManager->findUserBy(array('id' =>$id_recept));
        $messages = $this->getDoctrine()->getRepository('ChatBundle:Message')->findBy(
            array('author' => $this->getUser(), 'recepteur' => $usere)
        );

        return array(
            'messages' => $messages,
        );
    }
	
	/**
     * @Route("/list_autor/{channel}", name="cunningsoft_chat_list", defaults={"channel" = "default"})
     * @Template
     */
    public function list_autorAction($channel)
    {
        $messages = $this->getDoctrine()->getRepository('ChatBundle:Message')->findBy(
            array('recepteur' => $this->getUser())
        );

        return array(
            'messages' => $messages,
        );
    }
}
