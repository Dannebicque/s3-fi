<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index(): Response
    {
        return $this->render('recherche/index.html.twig', [
        ]);
    }

    #[Route('/recherche/resultat', name: 'app_recherche_resultat')]
    public function resultat(
        Request $request,
        ArticleRepository $articleRepository
    ): Response
    {
        $search = $request->query->get('search');
        $articles = $articleRepository->search($search);


        return $this->render('recherche/resultat.html.twig', [
            'articles' => $articles,
            'search' => $search
        ]);
    }
}
