<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\Admin\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
class CategoryController extends AdminController
{
    #[Route("/admin/categories", name: "app_admin_category_index")]
    public function index(CategoryRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/categories/create", name: "app_admin_category_create")]
    public function create(EntityManagerInterface $manager): Response
    {
        return $this->createEntity(
            $this->createForm(CategoryType::class),
            $manager,
        );
    }

    #[Route("/admin/categories/{id}", name: "app_admin_category_update")]
    public function update(EntityManagerInterface $manager, Category $category): Response
    {
        return $this->updateEntity(
            $this->createForm(CategoryType::class, $category),
            $manager,
        );
    }

    #[Route("/admin/categories/{id}/delete", name: "app_admin_category_delete")]
    public function delete(EntityManagerInterface $manager, Category $category): Response
    {
        return $this->deleteEntity(
            $category,
            $manager,
        );
    }
}
