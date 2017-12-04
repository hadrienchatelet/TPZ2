<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use App\Event\AppEvent;
use App\Event\PlayerEvent;
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
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $playerEvent = $this->get(PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);
            return $this->redirectToRoute('player');
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/{id}", name="show_player")
     */
    public function show(Player $player)
    {
        return $this->render("Player/show.html.twig", array("player"=>$player));
    }

    /**
     * @Route("/edit/{id}", name="editPlayer")
     */
    public function editPlayer(Request $request, Player $player)
    {
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $playerEvent = $this->get(PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_EDIT, $playerEvent);
            return $this->redirectToRoute('show_player_edited');
        }
        return $this->render('Entity/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/edited/{id}", name="show_player_edited")
     */
    public function showEdited(Player $player)
    {
        return $this->render("Player/edit.html.twig", array("player"=>$player));
    }
}