<?php

namespace App\Controller;

use App\Entity\Pelatis;
use App\Form\PelatisType;
use App\Repository\PelatisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pelatis")
 */
class PelatisController extends AbstractController
{
    /**
     * @Route("/", name="pelatis_index", methods={"GET"})
     */
    public function index(PelatisRepository $pelatisRepository): Response
    {
        return $this->render('pelatis/index.html.twig', [
            'pelatis' => $pelatisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pelatis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pelati = new Pelatis();
        $form = $this->createForm(PelatisType::class, $pelati);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pelati);
            $entityManager->flush();

            return $this->redirectToRoute('pelatis_index');
        }

        return $this->render('pelatis/new.html.twig', [
            'pelati' => $pelati,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pelatis_show", methods={"GET"})
     */
    public function show(Pelatis $pelati): Response
    {
        return $this->render('pelatis/show.html.twig', [
            'pelati' => $pelati,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pelatis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pelatis $pelati): Response
    {
        $form = $this->createForm(PelatisType::class, $pelati);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pelatis_index', [
                'id' => $pelati->getId(),
            ]);
        }

        return $this->render('pelatis/edit.html.twig', [
            'pelati' => $pelati,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pelatis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pelatis $pelati): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pelati->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pelati);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pelatis_index');
    }
}
