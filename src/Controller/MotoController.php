<?php

namespace App\Controller;

use App\Entity\Moto;
use App\Repository\MotoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/moto')]
class MotoController extends AbstractController
{
    #[Route('/', name: 'moto_index')]
    public function index(MotoRepository $repo): Response
    {
        return $this->render('moto/index.html.twig', [
            'motos' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'moto_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Moto $moto) : Response {

        return $this->render('moto/show.html.twig', [
            'moto' => $moto,
        ]);
    }

    #[Route('/create', name: 'moto_create', priority: 0, methods: ['GET', 'POST'])]
    public function create() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/edit', name: 'moto_edit',methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/delete', name: 'moto_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete() : Response {
        dd(__METHOD__);
    }
}
