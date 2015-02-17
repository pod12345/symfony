<?php

namespace Application\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ApplicationMainBundle:Main:index.html.twig', array('name' => $name));
    }
}
