<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use App\Entity\Inventory;
use App\Form\InventoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $inventory = $em->getRepository(Inventory::class)->findAll();

        return $this->render("Person/index.html.twig", array("persons"=>$inventory));
    }

    public function newInventory(Request $request)
    {
        $material = new Inventory();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(InventoryType::class, $material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($material);
            $em->flush();
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }
}