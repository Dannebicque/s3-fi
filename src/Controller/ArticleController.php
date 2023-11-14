<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        $articles = [
            1 => ['titre' => 'Mon premier article',
                'texte' => 'Un texte de mon article un peu long...',
                'date' => new \DateTime('now')
            ],
            2 => ['titre' => 'Mon deuxième article',
                'texte' => 'Un texte de mon article un peu long...',
                'date' => new \DateTime('now')
            ],
            3 => ['titre' => 'Mon troisième article',
                'texte' => 'Un texte de mon article un peu long...',
                'date' => new \DateTime('now')
            ],
        ];

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
