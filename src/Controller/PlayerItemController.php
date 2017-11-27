<?php
/**
 * Created by PhpStorm.
 * User: hadrien.chatelet
 * Date: 27/11/17
 * Time: 16:32
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/playerItem")
 */
class PlayerItemController extends Controller
{
    /**
     * @Route("/new", name="newPlayerItem")
     */
    public function newPlayer(Request $request)
    {
        $playerItem = $this->get(\App\Entity\Player::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PlayerItemType::class, $playerItem);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($playerItem);
            $em->flush();
            return $this->redirect("show_player", array("id"=>$playerItem->getPlayer()->getId()));
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }
}