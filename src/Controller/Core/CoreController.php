<?php


namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/contact", name="core_contact")
     */
    public function contact(Request $request)
    {
        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'La page de contact n\'est encore disponible');

        return $this->redirectToRoute('core_index');
    }
}