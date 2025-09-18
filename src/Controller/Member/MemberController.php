<?php

namespace App\Controller\Member;

use App\Entity\Member\Request;
use App\Form\Member\JoinRequestData;
use App\Form\Member\RequestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemberController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ){}

    #[Route('/member/join', 'app_member_join')]
    public function join(
        \Symfony\Component\HttpFoundation\Request $request,
    ): Response
    {
        $memberRequest = new Request();
        $memberRequest
            ->setRequester($this->getUser())
            ->setCreationDate(new \DateTime())
            ->setState(0)
        ;

        $form = $this->createForm(RequestType::class, $memberRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($memberRequest);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('Page/Member/join.html.twig', [
            'roles' => $this->getUser()->getRoles(),
            'form' => $form->createView(),
        ]);
    }
}