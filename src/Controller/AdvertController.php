<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return new Response('What a bewitching controller we have conjured!');
    }

    /**
     * @Route("/advert/{slug}")
     */
    public function view($slug)
    {
        $answers = [
            'Ca va bien',
            'I am 14 ans',
            'My name is Doudou',
        ];

        return $this->render('advert/view.html.twig', [
            'view' => ucwords(str_replace('-',' ', $slug)),
            'answers' => $answers,
        ]);

    }
}