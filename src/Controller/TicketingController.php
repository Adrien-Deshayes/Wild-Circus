<?php

namespace App\Controller;

use App\Repository\TicketingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketingController extends AbstractController
{
    /**
     * @Route("/bileteries", name="ticketing")
     */
    public function index(TicketingRepository $ticketingRepository): Response
    {
        return $this->render('ticketing/index.html.twig', [
            'ticketings' => $ticketingRepository->findAll()
        ]);
    }
}
