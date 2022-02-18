<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Entity\Book;
use App\Entity\User;
use App\Form\Front\SellBookType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route("/livres/{slug}", name: "app_front_book_show")]
    public function show(Book $book): Response
    {
        return $this->render('front/book/show.html.twig', [
            'book' => $book,
        ]);
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/livres/{slug}/modifier", name: "app_front_book_update")]
    public function update(
        Book $book,
        Request $request,
        EntityManagerInterface $manager,
    ): Response {
        /** @var User */
        $user = $this->getUser();

        if ($book->getReseller()->getId() !== $user->getId()) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(SellBookType::class, $book, [
            'reseller' => $user,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($book);
            $manager->flush();

            $from = $request->query->get('from', '');

            if ($from) {
                return $this->redirect($from);
            }

            return $this->redirectToRoute('app_front_book_show', [
                'slug' => $book->getSlug(),
            ]);
        }


        return $this->render('front/book/update.html.twig', [
            'form' => $form->createView(),
            'book' => $book,
        ]);
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/livres/{slug}/supprimer", name: "app_front_book_delete")]
    public function delete(
        Book $book,
        EntityManagerInterface $manager,
        Request $request,
    ): Response {
        /** @var User */
        $user = $this->getUser();

        if ($book->getReseller()->getId() !== $user->getId()) {
            throw new NotFoundHttpException();
        }

        $manager->remove($book);
        $manager->flush();

        $from = $request->query->get('from', '');

        if ($from) {
            return $this->redirect($from);
        }

        return $this->redirectToRoute('app_front_user_myBooks');
    }
}
