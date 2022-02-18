<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "app_front_home_index", methods: ["GET"])]
    public function index(BookRepository $repository): Response
    {
        $books = $repository->findLatest();

        return $this->render('front/home/index.html.twig', [
            'books' => $books,
        ]);
    }
}
