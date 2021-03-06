<?php

namespace App\Controller\Security\Recruiter;

use App\Controller\Security\Candidat\SecurityController;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\HttpFoundation\Request;

class SecurityControllerRecruiter extends SecurityController
{
    private $firstName;

    /**
     * @Route("/register_recruiter", name="app_registrer_recruiter")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardAuthenticatorHandler, LoginFormAuthenticator $formAuthenticator)
    {
        if ($request->isMethod('POST'))
        {
            $user = new User();

            $user->setFirstName($request->request->get('firstName'));
            $user->setLastName($request->request->get('lastName'));
            $user->setPhone($request->request->get('phone'));
            $user->setCity($request->request->get('city'));
            $user->setEmail($request->request->get('email'));
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $request->request->get('password')
            ));
            $user->setSiret($request->request->get('siret'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $guardAuthenticatorHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $formAuthenticator,
                'main'
            );
        }

        return $this->render('security/register_recruiter.html.twig');
    }
}
