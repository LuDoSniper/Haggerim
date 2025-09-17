<?php

namespace App\Controller\Authentication;

use App\Entity\Authentication\User;
use App\Form\Authentication\UserLoginType;
use App\Form\Authentication\UserRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class AuthenticationController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ){}

    #[Route('/login', 'app_login')]
    public function login(
        Request $request,
    ): Response
    {
        $form = $this->createForm(UserLoginType::class);
        $form->handleRequest($request);

        return $this->render('Page/Authentication/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/register', 'app_register')]
    public function register(
        Request $request,
    ): Response
    {
        $user = new User();

        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('Page/Authentication/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}