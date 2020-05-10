<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController
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
        return new Response(sprintf
        ('Future page de view "%s"',
        ucwords(str_replace('-',' ', $slug))
        ));
    }
}