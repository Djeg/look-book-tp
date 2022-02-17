<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Form\Admin\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
class BookController extends AdminController
{
    #[Route("/admin/books", name: "app_admin_book_index")]
    public function index(BookRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/books/create", name: "app_admin_book_create")]
    public function create(EntityManagerInterface $manager): Response
    {
        return $this->createEntity(
            $this->createForm(BookType::class),
            $manager,
        );
    }

    #[Route("/admin/books/{id}", name: "app_admin_book_update")]
    public function update(EntityManagerInterface $manager, Book $book): Response
    {
        return $this->updateEntity(
            $this->createForm(BookType::class, $book),
            $manager,
        );
    }

    #[Route("/admin/books/{id}/delete", name: "app_admin_book_delete")]
    public function delete(EntityManagerInterface $manager, Book $book): Response
    {
        return $this->deleteEntity(
            $book,
            $manager,
        );
    }
}
