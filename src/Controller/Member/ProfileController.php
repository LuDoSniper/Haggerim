<?php

namespace App\Controller\Member;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ){}

    #[Route('/member/profile', 'app_member_profile')]
    public function profile(
        Request $request,
    ): Response
    {
        return $this->render('Page/Member/profile.html.twig', []);
    }
}