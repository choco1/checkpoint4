<?php

namespace App\Controller;

use App\Entity\Decoration;
use App\Form\DecorationType;
use App\Repository\DecorationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/decoration")
 */

class DecorationController extends AbstractController
{
    /**
     * @Route("/", name="decoration_index", methods={"GET"})
     */
    public function index(DecorationRepository $decorationRepository): Response
    {
        return $this->render('decoration/index.html.twig', [
            'decorations' => $decorationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="decoration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decoration = new Decoration();
        $form = $this->createForm(DecorationType::class, $decoration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decoration);
            $entityManager->flush();

            return $this->redirectToRoute('decoration_index');
        }

        return $this->render('decoration/new.html.twig', [
            'decoration' => $decoration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decoration_show", methods={"GET"})
     */
    public function show(Decoration $decoration): Response
    {
        return $this->render('decoration/show.html.twig', [
            'decoration' => $decoration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decoration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Decoration $decoration): Response
    {
        $form = $this->createForm(DecorationType::class, $decoration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decoration_index');
        }

        return $this->render('decoration/edit.html.twig', [
            'decoration' => $decoration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decoration_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Decoration $decoration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decoration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decoration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decoration_index');
    }
}
