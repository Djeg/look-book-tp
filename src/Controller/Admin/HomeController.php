<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
class HomeController extends AbstractController
{
    #[Route("/admin", name: "app_admin_home_index", methods: ["GET"])]
    public function index(): Response
    {
        return $this->render('admin/home/index.html.twig');
    }
}
