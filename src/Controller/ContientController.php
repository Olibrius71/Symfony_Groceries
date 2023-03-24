<?php

namespace App\Controller;

use App\Entity\Contient;
use App\Form\ContientType;
use App\Repository\ContientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contient')]
class ContientController extends AbstractController
{
    #[Route('/', name: 'app_contient_index', methods: ['GET'])]
    public function index(ContientRepository $contientRepository): Response
    {
        return $this->render('contient/index.html.twig', [
            'contients' => $contientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contient_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContientRepository $contientRepository): Response
    {
        $contient = new Contient();
        $form = $this->createForm(ContientType::class, $contient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contientRepository->save($contient, true);

            return $this->redirectToRoute('app_contient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contient/new.html.twig', [
            'contient' => $contient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contient_show', methods: ['GET'])]
    public function show(Contient $contient): Response
    {
        return $this->render('contient/show.html.twig', [
            'contient' => $contient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contient $contient, ContientRepository $contientRepository): Response
    {
        $form = $this->createForm(ContientType::class, $contient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contientRepository->save($contient, true);

            return $this->redirectToRoute('app_contient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contient/edit.html.twig', [
            'contient' => $contient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contient_delete', methods: ['POST'])]
    public function delete(Request $request, Contient $contient, ContientRepository $contientRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contient->getId(), $request->request->get('_token'))) {
            $contientRepository->remove($contient, true);
        }

        return $this->redirectToRoute('app_contient_index', [], Response::HTTP_SEE_OTHER);
    }
}
