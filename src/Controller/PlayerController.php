<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('Player/index.html.twig', ['players' => $players]);
    }
}