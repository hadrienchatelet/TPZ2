<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use \DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PersonController extends Controller
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository(Person::class)->findAll();

        return $this->render("Person/index.html.twig", array("persons"=>$persons));
    }

    public function newPerson(Request $request)
    {
        $person = new Person();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($form);
            $em->flush();
        }
        return $this->render('Entity/new.html.twig', array('Form' => $form->createView()));
    }
}