<?php

namespace App\Service\Cart;

use App\Repository\TicketingRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{

    protected $session;
    protected $ticketingRepository;

    public function __construct(SessionInterface $session, TicketingRepository $ticketingRepository)
    {
        $this->session = $session;
        $this->ticketingRepository = $ticketingRepository;
    }

    public function add(int $id)
    {
        $panier = $this->session->get('panier', []);

        if (empty($panier[$id])) {
            $panier[$id] = 0;
        }

        $panier[$id]++;

        $this->session->set('panier', $panier);
    }

    public function remove(int $id)
    {
        $panier = $this->session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $this->session->set('panier', $panier);
    }

    public function getFullCart(): array
    {
        $panier = $this->session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'ticketing' => $this->ticketingRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $panierWithData;
    }

    public function getTotal(): float
    {
        $panierWithData = $this->getFullCart();

        $total = 0;

        foreach ($panierWithData as $couple) {
            $total += $couple['ticketing']->getPrice() * $couple['quantity'];
        }

        return $total;
    }
}