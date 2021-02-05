<?php

namespace App\Controller;

use App\Repository\TicketingRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService, TicketingRepository $ticketingRepository)
    {
        return $this->render('cart/index.html.twig', [
            "ticketings" => $cartService->getFullCart(),
            "total" => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/ajouter/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);

        return $this->redirectToRoute("ticketing");
    }

    /**
     * @Route("/supprimer/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService)
    {
        $cartService->remove($id);

        return $this->redirectToRoute('cart_index');
    }
}