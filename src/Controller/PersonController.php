<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:51
 */

namespace App\Controller;

use App\Entity\Person;
use \DateTime;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

        $form = $this->createFormBuilder($person)
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('createdAt', DateType::class)
            ->add('visible', CheckboxType::class)
            ->add('save', SubmitType::class, array('label' => 'Créer'))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

        }
        return $this->render('Entity/new.html.twig', array('form' => $form->createView()));
    }
}