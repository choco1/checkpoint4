<?php

namespace App\Controller;

use App\Entity\Decoration;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}