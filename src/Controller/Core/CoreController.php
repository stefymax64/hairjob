<?php


namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoreController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('core\index.html.twig', [
            'title' => 'Présentation du site',
            'subtitle' => 'Bienvenue'
    ]);
    }

    /**
     * @Route("/legalnotice", name="legal_notice")
     */
    public function legalNotice()
    {
        return $this->render('core\legalnotice.html.twig');
    }

    /**
     * @Route("/rgdp", name="legal_rgpd")
     */
    public function rgpd()
    {
        return $this->render('core/rgpd.html.twig');
    }

    /**
     * @Route("/cookies", name="legal_cookies")
     */
    public function cookies()
    {
        return $this->render('core/cookies.html.twig');
    }
}
