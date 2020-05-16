<?php


namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class CoreController extends AbstractController
{
    public function index()
    {
        return $this->render('Core\index.html.twig');
    }
    /**
     * @Route("/index", name="core_index")
     */
    public function contact(Request $request)
    {
        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'La page de contact n\'est encore disponible');

        return $this->redirectToRoute('core_index');
    }
}