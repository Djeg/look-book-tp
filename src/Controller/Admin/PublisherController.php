<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Publisher;
use App\Form\Admin\PublisherType;
use App\Repository\PublisherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
class PublisherController extends AdminController
{
    #[Route("/admin/publishers", name: "app_admin_publisher_index")]
    public function index(PublisherRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/publishers/create", name: "app_admin_publisher_create")]
    public function create(EntityManagerInterface $manager): Response
    {
        return $this->createEntity(
            $this->createForm(PublisherType::class),
            $manager,
        );
    }

    #[Route("/admin/publishers/{id}", name: "app_admin_publisher_update")]
    public function update(EntityManagerInterface $manager, Publisher $publisher): Response
    {
        return $this->updateEntity(
            $this->createForm(PublisherType::class, $publisher),
            $manager,
        );
    }

    #[Route("/admin/publishers/{id}/delete", name: "app_admin_publisher_delete")]
    public function delete(EntityManagerInterface $manager, Publisher $publisher): Response
    {
        return $this->deleteEntity(
            $publisher,
            $manager,
        );
    }
}
