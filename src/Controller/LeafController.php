<?php

namespace App\Controller;

use App\Entity\Leaf;
use App\Form\LeafType;
use App\Repository\LeafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/leaf")
 */
class LeafController extends AbstractController
{
    /**
     * @Route("/", name="leaf_index", methods={"GET"})
     */
    public function index(LeafRepository $leafRepository): Response
    {
        return $this->render('leaf/index.html.twig', [
            'leaves' => $leafRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="leaf_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $leaf = new Leaf();
        $form = $this->createForm(LeafType::class, $leaf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($leaf);
            $entityManager->flush();

            return $this->redirectToRoute('leaf_index');
        }

        return $this->render('leaf/new.html.twig', [
            'leaf' => $leaf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="leaf_show", methods={"GET"})
     */
    public function show(Leaf $leaf): Response
    {
        return $this->render('leaf/show.html.twig', [
            'leaf' => $leaf,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="leaf_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Leaf $leaf): Response
    {
        $form = $this->createForm(LeafType::class, $leaf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('leaf_index');
        }

        return $this->render('leaf/edit.html.twig', [
            'leaf' => $leaf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="leaf_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Leaf $leaf): Response
    {
        if ($this->isCsrfTokenValid('delete'.$leaf->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($leaf);
            $entityManager->flush();
        }

        return $this->redirectToRoute('leaf_index');
    }
}
