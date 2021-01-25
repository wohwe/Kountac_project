<?php
namespace Kountac\KountacBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GetFacture 
{
    public function __construct(ContainerInterface $container) 
    {
        $this->container = $container;        
    }
    
    public function facture($facture) 
    {
        $html = $this->container->get('templating')->render('UtilisateursBundle:Default:facture/facturePDF.html.twig', array('facture' => $facture));
        
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('Kountac_Tech');
        $html2pdf->pdf->SetTitle('Facture '.$facture->getReference());
        $html2pdf->pdf->SetSubject('Facture Kountac');
        $html2pdf->pdf->SetKeywords('facture,Kountac');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        
        return $html2pdf;
    }
    
}
