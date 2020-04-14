<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Workbook;
use App\Repository\WorkbookRepository;
use App\Entity\Leaf;
use App\Repository\LeafRepository;
use App\Entity\Board;
use App\Repository\BoardRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(
        WorkbookRepository $workbookRepository,
        LeafRepository $LeafRepository,
        BoardRepository $BoardRepository)
    {
        $workbooks = $this->getDoctrine()
        ->getRepository(Workbook::class)
        ->findAll();

        $leaves = $this->getDoctrine()
        ->getRepository(Leaf::class)
        ->findAll();

        $boards = $this->getDoctrine()
        ->getRepository(Board::class)
        ->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'workbook' => $workbooks,
            'leaf' => $leaves,
            'board' => $boards
        ]);
    }

    /**
    * @Route("workbook/list", name="workbook_list")
    */
    public function workbookList(WorkbookRepository $workbookRepository)
    {
        $workbooks = $this->getDoctrine()
            ->getRepository(Workbook::class)
            ->findAll();
        return $this->render('home/workbook.html.twig', [
            'workbooks' => $workbooks
        ]);
    }

    /**
     * @Route("workbook/{workbookId}", name="leaf_list")
     */
    public function leafList(LeafRepository $leafRepository, int $workbookId, BoardRepository $boardRepository)
    {
        $leaves = $leafRepository->findBy(['workbook' => $workbookId]);
        return $this->render('home/leaf.html.twig', [
            'leaves' => $leaves
        ]);
    }

    /**
     * @Route("leaf/{leafId}", name="board")
     */
    public function boardList(boardRepository $boardRepository, int $leafId)
    {
        $boards = $boardRepository->findBy(['leaf' => $leafId]);
        return $this->render('boardleaf/boardleaf.html.twig', [
            'boards' => $boards
        ]);
    }

    /**
    * @Route("/board/{id}", name="board", methods={"GET"})
    */
    public function board($id)
    {
        $board = $this->getDoctrine()
            ->getRepository(Board::class)
            ->findOneById($id);

        if (!$board) {
            throw $this->createNotFoundException('The board does not exist');
        }

        $variables = [
            'board' => $boards,
        ];

        return $this->render('boardleaf/boardleaf.html.twig', $variables);
    }
}
