<?php

namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
