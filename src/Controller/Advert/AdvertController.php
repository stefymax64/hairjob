<?php


namespace App\Controller\Advert;

use App\Entity\Advert;
use App\Entity\AdvertSkill;
use App\Entity\Application;
use App\Form\AdvertEditType;
use App\Form\AdvertType;
use App\Service\AdvertClean;
use App\Service\SpamGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdvertController extends AbstractController
{
    /**
     * @Route("/advert/{page}", name="advert_index", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @IsGranted("ROLE_USER")
     * @param $page
     * @return Response
     */
    public function index($page)
    {
        if ($page < 1) {
            throw $this->createNotFoundException('Page "' . $page . '" inexistante.');
        }

        $nbPerPage = 5;

        $listAdverts = $this->getDoctrine()
            ->getManager()
            ->getRepository(Advert::class)
            ->getAdverts($page, $nbPerPage);

        $nbPages = ceil(count($listAdverts) / $nbPerPage);

        if ($page > $nbPages) {
            throw $this->createNotFoundException('Page "' . $page . '" inexistante.');
        }

        return $this->render('advert/index.html.twig', [
            'listAdverts' => $listAdverts,
            'nbPages' => $nbPages,
            'page' => $page]);
    }

    /**
     * @Route("/advert/view/{id}", name="advert_view", requirements={"id" = "\d+"})
     */
    public function view($id)
    {
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository(Advert::class)->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce" . $id . "n'existe pas");
        }

        $listApplications = $em
            ->getRepository(Application::class)
            ->findBy([
                'advert' => $advert]);

        $listAdvertSkills = $em
            ->getRepository(AdvertSkill::class)
            ->findBy([
                'advert' => $advert]);

        return $this->render('advert/view.html.twig', [
            'advert' => $advert,
            'listApplications' => $listApplications,
            'listAdvertSkills' => $listAdvertSkills]);
    }

    /**
     * @Route("/advert/add", name="advert_add")
     * @IsGranted("ROLE_RECRUITER", message="Espace reservé aux recruteurs identifiés !")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function add(Request $request)
    {
        $advert = new Advert();
        $form = $this->createForm(AdvertType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'L\'annonce est enregistrée.');
            return $this->redirectToRoute('advert_view', [
                'id' => $advert->getId()]);
        }

        return $this->render('advert/add.html.twig', [
            'form' => $form->createView()]);
    }

    /**
     * @Route("/advert/edit/{id}", name="advert_edit", requirements={"id" = "\d+"})
     * @IsGranted("ROLE_ADMIN", message="Espace reservé à l'administrateur du site !")
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository('App:Advert')->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce" . $id . "n'existe pas");
        }

        $form = $this->createForm(AdvertEditType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'L\'annonce a été modifié.');
            return $this->redirectToRoute('advert_view', [
                'id' => $advert->getId()]);
        }

        return $this->render('advert/edit.html.twig', [
            'advert' => $advert,
            'form' => $form->createView()]);
    }

    /**
     * @Route("/advert/delete/{id}", name="advert_delete", requirements={"id" = "\d+"})
     * @IsGranted("ROLE_ADMIN", message="Espace reservé à l'administrateur du site !")
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Response
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository('App:Advert')->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce" . $id . "n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($advert);
            $em->flush();
            $request->getSession()->getFlashBag()->add('info', "L'annonce a été supprimé");

            return $this->redirectToRoute('advert_index');
        }
        return $this->render('advert/delete.html.twig', [
            'advert' => $advert,
            'form' => $form->createView()]);
    }

    public function menu($limit)
    {
        $em = $this->getDoctrine()->getManager();

        $listAdverts = $em->getRepository(Advert::class)->findBy(
            [],
            ['date' => 'desc'],
            $limit,
            0
        );
        return $this->render('advert/_menu.html.twig', [
            'listAdverts' => $listAdverts]);
    }

    public function new(SpamGenerator $spamGenerator)
    {
        $messages = $spamGenerator->getSpamMessage();
        $this->addFlash('success', $messages);
    }

    public function cleanUp(Request $request, $days)
    {
        $cleaner = $this->get(AdvertClean::class);
        $cleaner->purge($days);
        $request->getSession()->getFlashBag()->add('info', 'Les annonces plus anciennes que ' . $days . ' jours ont étés nettoyées.');

        return $this->redirectToRoute('advert_index');
    }
}
