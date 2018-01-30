<?php
namespace Utilisateurs\UtilisateursBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddRoleFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::POST_SUBMIT => 'setRole');
    }

    public function setRole(FormEvent $event)
    {
        $aRoles = array('ROLE_PRO');

        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        $user->setRoles($aRoles);
   }
}