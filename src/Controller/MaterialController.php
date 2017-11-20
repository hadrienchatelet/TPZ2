<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use App\Entity\Material;
use App\Form\MaterialType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository(Material::class)->findAll();

        return $this->render("Person/index.html.twig", array("persons"=>$persons));
    }

    public function newMaterial(Request $request)
    {
        $material = new Material();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(MaterialType::class, $material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($material);
            $em->flush();
        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }
}