<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Form\Admin\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
class AuthorController extends AdminController
{
    #[Route("/admin/authors", name: "app_admin_author_index")]
    public function index(AuthorRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/authors/create", name: "app_admin_author_create")]
    public function create(EntityManagerInterface $manager): Response
    {
        return $this->createEntity(
            $this->createForm(AuthorType::class),
            $manager,
        );
    }

    #[Route("/admin/authors/{id}", name: "app_admin_author_update")]
    public function update(EntityManagerInterface $manager, Author $author): Response
    {
        return $this->updateEntity(
            $this->createForm(AuthorType::class, $author),
            $manager,
        );
    }

    #[Route("/admin/authors/{id}/delete", name: "app_admin_author_delete")]
    public function delete(EntityManagerInterface $manager, Author $author): Response
    {
        return $this->deleteEntity(
            $author,
            $manager,
        );
    }
}
