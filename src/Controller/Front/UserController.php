<?php

namespace App\Controller\Front;

use App\Entity\Basket;
use App\Entity\Book;
use App\Entity\User;
use App\Form\Front\UserProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    #[Route("/connexion", name: "app_front_user_login")]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_front_home_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('front/user/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route("/deconnexion", name: "app_front_user_logout")]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/mon-profile", name: "app_front_user_profil")]
    public function profil(
        UserPasswordHasherInterface $encoder,
        EntityManagerInterface $manager,
        Request $request,
    ): Response {
        $user = $this->getUser();
        $form = $this->createForm(UserProfilType::class, $user, [
            'mode' => 'edit',
            'password_encoder' => $encoder,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();
        }

        return $this->render('front/user/profil.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/inscription", name: "app_front_user_subscription")]
    public function subscription(
        UserPasswordHasherInterface $encoder,
        EntityManagerInterface $manager,
        Request $request,
    ): Response {
        $form = $this->createForm(UserProfilType::class, null, [
            'mode' => 'create',
            'password_encoder' => $encoder,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
            $manager->persist($form->getData());
            $manager->flush();

            return $this->redirectToRoute('app_front_user_login');
        }

        return $this->render('front/user/subscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/mes-livres", name: "app_front_user_myBooks")]
    public function myBooks(): Response
    {
        return $this->render('front/user/myBooks.html.twig');
    }

    #[Route("/profile/{slug}", name: "app_front_user_seeProfil")]
    public function seeProfil(User $user): Response
    {
        return $this->render('front/user/seeProfil.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route("/profile/{slug}/ses-livres", name: "app_front_user_seeBooks")]
    public function seeBooks(User $user): Response
    {
        return $this->render('front/user/seeBooks.html.twig', [
            'user' => $user,
        ]);
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/mon-panier", name: "app_front_user_basket")]
    public function basket(): Response
    {
        return $this->render('front/user/basket.html.twig');
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/mon-panier/{slug}/ajouter", name: "app_front_user_addToBasket")]
    public function addToBasket(
        EntityManagerInterface $manager,
        Book $book,
        Request $request,
    ): Response {
        /** @var User */
        $user = $this->getUser();
        /** @var Basket */
        $basket = $user->getBasket();

        $basket->addBook($book);

        $manager->persist($basket);
        $manager->flush();

        return $this->redirect(
            $request->query->has('from')
                ? $request->query->get('from')
                : $this->generateUrl('app_front_user_basket')
        );
    }

    #[IsGranted("ROLE_USER")]
    #[Route("/mon-panier/{slug}/supprimer", name: "app_front_user_removeFromBasket")]
    public function removeFromBasket(
        EntityManagerInterface $manager,
        Book $book,
        Request $request,
    ): Response {
        /** @var User */
        $user = $this->getUser();
        /** @var Basket */
        $basket = $user->getBasket();

        $basket->removeBook($book);

        $manager->persist($basket);
        $manager->flush();

        return $this->redirect(
            $request->query->has('from')
                ? $request->query->get('from')
                : $this->generateUrl('app_front_user_basket')
        );
    }
}
