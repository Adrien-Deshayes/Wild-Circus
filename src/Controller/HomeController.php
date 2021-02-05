<?php

namespace App\Controller;

use App\Entity\Logo;
use App\Repository\LogoRepository;
use App\Repository\PerformanceRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PerformanceRepository $performanceRepository,CartService $cartService): Response
    {
        return $this->render('home/index.html.twig', [
            'ticketings' => $cartService,
            'performances' => $performanceRepository->findAll()
        ]);
    }
}
