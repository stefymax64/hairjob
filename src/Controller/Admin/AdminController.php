<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN", message="Espace reservé à l'administrateur du site !")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/users", name="users")
     * @param UserRepository $users
     * @return Response
     */
    public function usersList(UserRepository $users)
    {
        return $this->render("admin/users.html.twig", [
            'users' => $users->findAll()
        ]);
    }

    /**
     * @Route("/users/edit/{id}", name="edit_users")
     * @param User $user
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editUser(User $user, Request $request){
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();

           $this->addFlash('message', 'Utilisateur modifié avec succès !');
           return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/edit_user.html.twig', [
            'userForm' => $form->createView()
        ]);
    }
}
