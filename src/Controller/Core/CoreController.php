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
        return $this->render('Core\index.html.twig', [
            'title' => 'Présentation du site',
            'subtitle' => 'Bienvenue'
    ]);
    }
}