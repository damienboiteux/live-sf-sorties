<?php

namespace App\Controller;

use App\Entity\Adhesion;
use App\Repository\AdhesionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/adhesion')]
class AdhesionController extends AbstractController
{
    #[Route('/', name: 'adhesion_index')]
    public function index(AdhesionRepository $repo): Response
    {
        return $this->render('adhesion/index.html.twig', [
            'adhesions' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'adhesion_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Adhesion $adhesion) : Response {

        return $this->render('adhesion/show.html.twig', [
            'adhesion' => $adhesion,
        ]);
    }

    #[Route('/create', name: 'adhesion_create', priority: 0, methods: ['GET', 'POST'])]
    public function create() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/edit', name: 'adhesion_edit',methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/delete', name: 'adhesion_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete() : Response {
        dd(__METHOD__);
    }
}
