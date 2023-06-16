<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Form\ModeleType;
use App\Repository\ModeleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/modele')]
class ModeleController extends AbstractController
{
    #[Route('/', name: 'modele_index')]
    public function index(ModeleRepository $repo): Response
    {
        return $this->render('modele/index.html.twig', [
            'modeles' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'modele_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Modele $modele) : Response {

        return $this->render('modele/show.html.twig', [
            'modele' => $modele,
        ]);
    }

    #[Route('/create', name: 'modele_create', priority: 0, methods: ['GET', 'POST'])]
    public function create(Request $request, ModeleRepository $repo) : Response {
        $modele = new Modele();
        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($modele, true);
            $this->addFlash('success', 'Le modèle a bien été ajouté.');
            return $this->redirectToRoute('modele_index');
        }
        return $this->render('modele/create.html.twig', [
            'formView' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'modele_edit',methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update() : Response {
        dd(__METHOD__);
    }

    #[Route('/{id}/delete', name: 'modele_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete() : Response {
        dd(__METHOD__);
    }
}
