<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/item")
 */
class ItemController extends Controller
{
    /**
     * @Route("/index", name="item")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository(Item::class)->findAll();

        return $this->render("Item/index.html.twig", array("items"=>$items));
    }
    /**
     * @Route("/new", name="newItem")
     */
    public function newItem(Request $request)
    {
        $item = $this->get(\App\Entity\Item::class);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($item);
            $em->flush();
            return $this->redirect("item");
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }
}