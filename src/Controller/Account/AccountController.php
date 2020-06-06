<?php

namespace App\Controller\Account;

use App\Controller\BaseController;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccountController
 * @package App\Controller\Account
 * @IsGranted("ROLE_USER")
 */
class AccountController extends BaseController
{
    private $logger;
    /**
     * @Route("/Account", name="app_account")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->debug('Checking account page for '.$this->getUser()->getEmail());

        return $this->render('Account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
