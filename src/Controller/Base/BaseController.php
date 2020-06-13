<?php

namespace App\Controller\Base;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;


abstract class BaseController extends AbstractController
{
    /**
     * @return User
     */
    protected function getUser()
    {
        return parent::getUser();
    }

    /**
     * @Route("/base", name="app_base")
     * @param LoggerInterface $logger
     * @return Response
     */
    public function index(LoggerInterface $logger)
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
