<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MarqueController extends AbstractController
{

// Create Read (tous & 1) Update Delete


    #[Route('/marque', name: 'marque_index', methods: ['GET'])]
    public function index(MarqueRepository $repo): Response
    {
        return $this->render('marque/index.html.twig', [
            'marques'=> $repo->findAll(),
        ]);
    }

    #[Route('/marque/{id}', name: 'marque_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Marque $marque) : Response {

        return $this->render('marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }

    #[Route('/marque/create', name: 'marque_create', priority: 0, methods: ['GET', 'POST'])]
    public function create(Request $request, MarqueRepository $repo) : Response {

        $marque = new Marque();

        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);
      
        if($form->isSubmitted() && $form->isValid()) {
            $repo->save($marque, true);
            return $this->redirectToRoute('marque_index');
        }
  
        return $this->render('marque/create.html.twig', [
            'formView' => $form->createView(),
        ]);
        
    }

    #[Route('/marque/{id}/edit', name: 'marque_edit',methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function update(Marque $marque, Request $request, MarqueRepository $repo) : Response {
        
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
           $repo->save($marque, true);

           return $this->redirectToRoute('marque_index');
        }

        return $this->render('marque/edit.html.twig', [
            'formView' => $form->createView(),
        ]);
    }

    #[Route('/marque/{id}/delete', name: 'marque_delete', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function delete(Marque $marque, MarqueRepository $repo) : Response {
        $repo->remove($marque, true);
        return $this->redirectToRoute('marque_index');
    }

}
