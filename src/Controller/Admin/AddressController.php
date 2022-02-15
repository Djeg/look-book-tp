<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Address;
use App\Form\Admin\AddressType;
use App\Repository\AddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
class AddressController extends AdminController
{
    #[Route("/admin/addresses", name: "app_admin_address_index", methods: ["GET"])]
    public function index(AddressRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/addresses/create", name: "app_admin_address_create", methods: ["GET", "POST"])]
    public function create(EntityManagerInterface $manager): Response
    {
        return $this->createEntity(
            $this->createForm(AddressType::class),
            $manager,
        );
    }

    #[Route("/admin/addresses/{id}", name: "app_admin_address_update", methods: ["GET", "POST"])]
    public function update(
        EntityManagerInterface $manager,
        Address $address,
    ): Response {
        return $this->updateEntity(
            $this->createForm(AddressType::class, $address),
            $manager,
        );
    }

    #[Route("/admin/addresses/{id}/delete", name: "app_admin_address_delete", methods: ["GET"])]
    public function delete(
        EntityManagerInterface $manager,
        Address $address,
    ): Response {
        return $this->deleteEntity($address, $manager);
    }
}
