<?php

namespace App\Controller;

use App\Entity\Workbook;
use App\Form\WorkbookType;
use App\Repository\WorkbookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/workbook")
 */
class WorkbookController extends AbstractController
{
    /**
     * @Route("/", name="workbook_index", methods={"GET"})
     */
    public function index(WorkbookRepository $workbookRepository): Response
    {
        return $this->render('workbook/index.html.twig', [
            'workbooks' => $workbookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="workbook_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $workbook = new Workbook();
        $form = $this->createForm(WorkbookType::class, $workbook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($workbook);
            $entityManager->flush();

            return $this->redirectToRoute('workbook_index');
        }

        return $this->render('workbook/new.html.twig', [
            'workbook' => $workbook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workbook_show", methods={"GET"})
     */
    public function show(Workbook $workbook): Response
    {
        return $this->render('workbook/show.html.twig', [
            'workbook' => $workbook,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="workbook_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Workbook $workbook): Response
    {
        $form = $this->createForm(WorkbookType::class, $workbook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('workbook_index');
        }

        return $this->render('workbook/edit.html.twig', [
            'workbook' => $workbook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workbook_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Workbook $workbook): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workbook->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($workbook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('workbook_index');
    }
}
