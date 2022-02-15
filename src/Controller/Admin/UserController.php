<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\Admin\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AdminController
{
    #[Route("/admin/users", name: "app_admin_user_index", methods: ["GET"])]
    public function index(UserRepository $repository): Response
    {
        return $this->listEntities($repository);
    }

    #[Route("/admin/users/create", name: "app_admin_user_create", methods: ["GET", "POST"])]
    public function create(EntityManagerInterface $manager, UserPasswordHasherInterface $encoder): Response
    {
        return $this->createEntity(
            $this->createForm(UserType::class, null, [
                'password_encoder' => $encoder,
            ]),
            $manager,
        );
    }

    #[Route("/admin/users/{id}", name: "app_admin_user_update", methods: ["GET", "POST"])]
    public function update(
        EntityManagerInterface $manager,
        UserPasswordHasherInterface $encoder,
        User $user,
    ): Response {
        return $this->updateEntity(
            $this->createForm(UserType::class, $user, [
                'password_encoder' => $encoder,
            ]),
            $manager,
        );
    }

    #[Route("/admin/users/{id}/delete", name: "app_admin_user_delete", methods: ["GET"])]
    public function delete(
        EntityManagerInterface $manager,
        User $user,
    ): Response {
        return $this->deleteEntity($user, $manager);
    }
}
