<?php


namespace App\Controller;

use App\Entity\Advert;
use App\Entity\Image;
use App\Entity\Application;
use App\Entity\AdvertSkill;
use App\Entity\Category;
use App\Entity\Skill;
use App\Service\SpamGenerator;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AdvertController extends AbstractController
{
    /**
     * @Route("/{page}", name="advert_index", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function index($page)
    {
        if ($page < 1)
        {
            throw $this->createNotFoundException('Page "'.$page.'" inexistante.');
        }
        $nbPerPage = 5;

        $listAdverts = $this->getDoctrine()
            ->getManager()
            ->getRepository(Advert::class)
            ->getAdverts($page, $nbPerPage);

        $nbPages = ceil(count($listAdverts) / $nbPerPage);
        if ($page > $nbPages)
        {
            throw $this->createNotFoundException('Page "'.$page.'" inexistante.');
        }

        return $this->render('Advert/index.html.twig', array(
            'listAdverts' => $listAdverts,
            'nbPages' => $nbPages,
            'page' => $page
        ));
    }

    /**
     * @Route("/view/{id}", name="advert_view", requirements={"id" = "\d+"})
     */
    public function view($id)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository(Advert::class)->find($id);

        if (null === $advert)
        {
            throw new NotFoundHttpException("L'annonce".$id."n'existe pas");
        }

        $listApplications = $em
            ->getRepository(Application::class)
            ->findBy(array('advert'=>$advert));

        $listAdvertSkills = $em
            ->getRepository(AdvertSkill::class)
            ->findBy(array('advert' => $advert));

        return $this->render('Advert/view.html.twig', [
            'advert' => $advert,
            'listApplications' => $listApplications,
            'listAdvertSkills' => $listAdvertSkills
            ]);
    }

    /**
     * @Route("/add", name="advert_add")
     */
    public function add(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST'))
        {
            $request->getSession()->getFlashBag()->add('notice', 'L\'annonce est enregistrée.');
            return $this->redirectToRoute('advert_view', ['id' => $advert->getId()]);
        }
        return $this->render('Advert/add.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="advert_edit", requirements={"id" = "\d+"})
     */
    public function edit($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('App:Advert')->find($id);

        if (null === $advert)
        {
            throw new NotFoundHttpException("L'annonce".$id."n'existe pas");
        }

        if ($request->isMethod('POST'))
        {
            $request->getFlashBag()->add('notice', 'L\'annonce a été modifié.');
            return $this->redirectToRoute('advert_view', ['id' => $advert->getId()]);
        }

        return $this->render('Advert/edit.html.twig', ['advert' => $advert]);
    }

    /**
     * @Route("/delete/{id}", name="advert_delete", requirements={"id" = "\d+"})
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('App:Advert')->find($id);

        if (null === $advert)
        {
            throw new NotFoundHttpException("L'annonce".$id."n'existe pas.");
        }

        foreach ($advert->getCategories() as $category)
        {
            $advert->removeCategory($category);
        }
        $em->flush();

        return $this->render('Advert/delete.html.twig');
    }

    public function menu($limit)
    {
        $em = $this->getDoctrine()->getManager();

        $listAdverts = $em->getRepository(Advert::class)->findBy(
            array(),
            array('date' => 'desc'),
            $limit,
            0
        );
        return $this->render('Advert/_menu.html.twig', array('listAdverts' => $listAdverts));
    }

    public function new(SpamGenerator $spamGenerator)
    {
        $message = $spamGenerator->getSpamMessage();
        $this->addFlash('success', $message);
    }
}