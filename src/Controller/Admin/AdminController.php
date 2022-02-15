<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Admin\UpdatableEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    protected function listEntities(ServiceEntityRepository $repository): Response
    {
        $entites = $repository->findAll();

        return $this->render("admin/{$this->getTemplatePath()}/index.html.twig", [
            'data' => $entites,
        ]);
    }

    protected function createEntity(
        FormInterface $form,
        EntityManagerInterface $manager,
    ): Response {
        $request = $this->container->get('request_stack')->getCurrentRequest();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();

            $this->addFlash('success', "Votre création à bien était pris en compte :)");

            return $this->redirectToRoute(
                "app_admin_{$this->getTemplatePath()}_index"
            );
        }

        return $this->render("admin/{$this->getTemplatePath()}/create.html.twig", [
            'form' => $form->createView(),
        ]);
    }

    protected function updateEntity(
        FormInterface $form,
        EntityManagerInterface $manager,
    ): Response {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();

            $this->addFlash('success', "Votre mise à jour a bien était pris en compte :)");

            return $this->redirectToRoute(
                "app_admin_{$this->getTemplatePath()}_index"
            );
        }

        return $this->render("admin/{$this->getTemplatePath()}/update.html.twig", [
            'form' => $form->createView(),
        ]);
    }

    public function deleteEntity(UpdatableEntity $entity, EntityManagerInterface $manager): Response
    {
        $manager->remove($entity);
        $manager->flush();

        $this->addFlash('success', "Votre suppression a bien était pris en compte :)");

        return $this->redirectToRoute(
            "app_admin_{$this->getTemplatePath()}_index"
        );
    }

    protected function getControllerName(): string
    {
        $className = $this::class;
        $parts = explode('\\', $className);
        $lastPart = end($parts);

        return str_replace('Controller', '', $lastPart);
    }

    protected function getTemplatePath(): string
    {
        $controllerName = $this->getControllerName();

        return strtolower($controllerName);
    }
}
