<?php

namespace App\Controller;

use App\Entity\Decoration;
use App\Entity\Form;
use App\Form\FormType;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('/home/index.html.twig', [
            'controller_name' => 'deco of yr home',
        ]);
    }

    /**
     * @Route("/oriental", name="oriental")
     */

    public function decoOriental(): \Symfony\Component\HttpFoundation\Response
    {
        $decorations = $this->getDoctrine()
            ->getRepository(Decoration::class)
            ->findAll();

        return $this->render('deco/decoOrt.html.twig',
            ['decorations' => $decorations]
        );
    }

    /**
     * @Route("/europeenne", name="europe")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function decoEuroopenne()
    {
        $decorations = $this->getDoctrine()
            ->getRepository(Decoration::class)
            ->findAll();

        return $this->render('deco/decoEurp.html.twig',[
             'decorations' => $decorations
        ]);
    }

    /**
     * @Route("/form", name="formulaire")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function form(Request $request)
    {
        $client = new Form();
        $form = $this->createForm(FormType::class,$client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('form/form.html.twig', [
                'form' => $form->createView(),
            ]
        );
    }
}