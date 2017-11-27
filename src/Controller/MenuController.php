<?php
/**
 * Created by PhpStorm.
 * User: hadrien.chatelet
 * Date: 27/11/17
 * Time: 15:42
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render("indexMenu.html.twig");
    }
}