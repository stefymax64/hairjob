<?php


namespace App\Controller;

use App\Entity\Advert;
use App\Entity\Image;
use App\Entity\Application;
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
        $listAdverts = array(
            array(
                'title'   => 'Recherche collaorateur (H/F)',
                'id'      => 1,
                'author'  => 'La tête à l\'envers',
                'content' => 'Petit salon dynamique à Narbonne recherche un(e) collaborateur(trice), 5ans d’expérience souhaitée après le BP, contrat CDI, à temps plein (35 h)... ',
                'date'    => new DateTime()),
            array(
                'title'   => 'Apprentissage BP Coiffure',
                'id'      => 2,
                'author'  => 'Clarisse',
                'content' => 'Actuellement en apprentissage CAP Coiffure, je recherche un salon sur La Rochelle ou alentours afin de poursuivre sur un Brevet Professionnel... ',
                'date'    => new DateTime()),
            array(
                'title'   => 'Coiffeuse',
                'id'      => 3,
                'author'  => 'Idcolor\'s',
                'content' => 'Recherche coiffeuse 3/ par semaine jeudi/vend/Sam
                Si vous êtes dynamiquet professionnel appeler moi.possibilité plein temps par la suite... ',
                'date'    => new DateTime()));
        return $this->render('Advert/index.html.twig', array('listAdverts' => array()));
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

        return $this->render('Advert/view.html.twig', ['advert' => $advert, 'listApplications' => $listApplications]);
    }

    /**
     * @Route("/add", name="advert_add")
     */
    public function add(Request $request)
    {
        $advert = new Advert();
        $advert->setTitle( 'Recherche collaborateur (H/F)');
        $advert->setAuthor('La tête à l\'envers');
        $advert->setContent('Petit salon dynamique à Narbonne recherche un(e) collaborateur(trice), 5ans d’expérience souhaitée après le BP, contrat CDI, à temps plein (35 h)');

        $image = new Image();
        $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
        $image->setAlt('Job de rêve');

        $advert->setImage($image);

        $application1 = new Application();
        $application1->setAuthor('Karen');
        $application1->setContent("J'ai toutes les qualités requises.");

        $application2 = new Application();
        $application2->setAuthor('Maxime');
        $application2->setContent("Je suis très motivé.");

        $application1->setAdvert($advert);
        $application2->setAdvert($advert);

        $em = $this->getDoctrine()->getManager();

        $em->persist($advert);
        $em->persist($application1);
        $em->persist($application2);

        $em->flush();

        if ($request->isMethod('POST'))
        {
            $this->addFlash('notice', 'L\'annonce est enregistrée.');
            return $this->redirectToRoute('advert_view', ['id' => 5]);
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

        $listCategories = $em->getRepository('App:Category')->findAll();

        foreach ($listCategories as $category)
        {
            $advert->addCategory($category);
        }
        $em->flush();

        if ($request->isMethod('POST'))
        {
            $this->addFlash('notice', 'L\'annonce a été modifié.');
            return $this->redirectToRoute('advert_view', ['id' => 5]);
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
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche collaorateur (H/F)'),
            array('id' => 5, 'title' => 'Apprentissage BP Coiffure'),
            array('id' => 9, 'title' => 'Coiffeuse')
        );
        return $this->render('Advert/_menu.html.twig', array('listAdverts' => $listAdverts));
    }

    public function new(SpamGenerator $spamGenerator)
    {
        $message = $spamGenerator->getSpamMessage();
        $this->addFlash('success', $message);
    }
}