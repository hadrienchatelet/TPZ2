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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonController extends Controller
{
    public function index()
    {

    }

    public function newPerson()
    {
        $em = $this->getDoctrine()->getManager();
        $person = new Person();
        $person->setId(1);
    }
}