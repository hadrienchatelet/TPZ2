<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Player;
use App\Form\PlayerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/player")
 */
class PlayerController extends Controller
{
    /**
     * @Route("/index", name="player")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository(Player::class)->findAll();

        return $this->render("Player/index.html.twig", array("players"=>$players));
    }

    /**
     * @Route("/new", name="newPlayer")
     */
    public function newPlayer(Request $request)
    {
        $player = $this->get(\App\Entity\Player::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($player);
            $em->flush();
            return $this->redirect("player");
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/player/{id}", name="show_player")
     */
    public function show(Player $player)
    {
        return $this->render("Player/show.html.twig", array("player"=>$player));
    }
}