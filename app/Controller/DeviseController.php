<?php

namespace Kountac\KountacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeviseController extends Controller
{
    public function deviseMainAction()
    {
        $session = $this->getRequest()->getSession();
        
        return $this->render('KountacBundle:Menu:deviseHeader.html.twig', array(
            'euro' => $session->get('euro'),
            'livre' => $session->get('livre'),
            'usa' => $session->get('usa'),
            'naira' => $session->get('naira'),
            'cfa' => $session->get('cfa'),
            ));
    }
    
    public function deviseMainAdminAction()
    {
        $session = $this->getRequest()->getSession();
        
        return $this->render('KountacBundle:Menu:deviseHeaderAdmin.html.twig', array(
            'euro' => $session->get('euro'),
            'livre' => $session->get('livre'),
            'usa' => $session->get('usa'),
            'naira' => $session->get('naira'),
            'cfa' => $session->get('cfa')));
    }
    
    public function euroDeviseAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('euro', '1');
        
        if ($session->has('cfa'))
            $session->remove('cfa');
        
        if ($session->has('livre'))
            $session->remove('livre');
        
        if ($session->has('usa'))
            $session->remove('usa');
        
        if ($session->has('naira'))
            $session->remove('naira');
        $this->get('session')->getFlashBag()->add('success','Vous avez choisi la devise Euro €');       
        return $this->redirect($this->generateUrl('kountac_homepage'));
    }
    
    public function cfaDeviseAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('cfa', '1');
        
        if ($session->has('euro'))
            $session->remove('euro');
        
        if ($session->has('livre'))
            $session->remove('livre');
        
        if ($session->has('usa'))
            $session->remove('usa');
        
        if ($session->has('naira'))
            $session->remove('naira');
        $this->get('session')->getFlashBag()->add('success','Vous avez choisi la devise F CFA');
        return $this->redirect($this->generateUrl('kountac_homepage'));
    }
        
    public function usaDeviseAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('usa', '1');
        
        if ($session->has('euro'))
            $session->remove('euro');
        
        if ($session->has('livre'))
            $session->remove('livre');
        
        if ($session->has('cfa'))
            $session->remove('cfa');
        
        if ($session->has('naira'))
            $session->remove('naira');
        $this->get('session')->getFlashBag()->add('success','Vous avez choisi la devise USD $');
        return $this->redirect($this->generateUrl('kountac_homepage'));
    }
    
    public function livreDeviseAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('livre', '1');
        
        if ($session->has('euro'))
            $session->remove('euro');
        
        if ($session->has('cfa'))
            $session->remove('cfa');
        
        if ($session->has('usa'))
            $session->remove('usa');
        
        if ($session->has('naira'))
            $session->remove('naira');
        $this->get('session')->getFlashBag()->add('success','Vous avez choisi la devise GBP £');
        return $this->redirect($this->generateUrl('kountac_homepage'));
    }
    
    public function nairaDeviseAction()
    {
        $session = $this->getRequest()->getSession();
        $session->set('naira', '1');
        
        if ($session->has('euro'))
            $session->remove('euro');
        
        if ($session->has('livre'))
            $session->remove('livre');
        
        if ($session->has('usa'))
            $session->remove('usa');
        
        if ($session->has('cfa'))
            $session->remove('cfa');
        $this->get('session')->getFlashBag()->add('success','Vous avez choisi la devise Naïra ₦');
        return $this->redirect($this->generateUrl('kountac_homepage'));
    }
}
