<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/ajout', name: 'app_categorie_ajout')]
    public function ajout(
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager->persist($categorie);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie', ['categorie' => $categorie->getId()]);
        }

        return $this->render('categorie/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/categorie/modifier/{id}', name: 'app_categorie_edit')]
    public function modifier(
        Request                $request,
        EntityManagerInterface $entityManager,
        Categorie              $categorie
    ): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie', ['categorie' => $categorie->getId()]);
        }

        return $this->render('categorie/modifier.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/categorie/{categorie}', name: 'app_categorie')]
    public function index(Categorie $categorie): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }


}
