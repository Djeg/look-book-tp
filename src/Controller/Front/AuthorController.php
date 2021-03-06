<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route("/auteurs/{id}", name: "app_front_author_show")]
    public function show(Author $author): Response
    {
        return $this->render('front/author/show.html.twig', [
            'author' => $author,
        ]);
    }
}
