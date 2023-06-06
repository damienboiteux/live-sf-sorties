<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Repository\SortieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/sortie')]
class SortieController extends AbstractController
{
    #[Route('/', name: 'sortie_index')]
    public function index(SortieRepository $repo): Response
    {
        return $this->render('sortie/index.html.twig', [
            'sorties' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'sortie_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Sortie $sortie) : Response {

        return $this->render('sortie/show.html.twig', [
            'sortie' => $sortie,
        ]);
    }

    #[Route('/create', name: 'sortie_create', priority: 0, methods: ['GET', 'POST'])]
    public function create() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/edit', name: 'sortie_edit',methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/delete', name: 'sortie_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete() : Response {
        dd(__METHOD__);
    }
}
