<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExoExtendLink extends Controller
{
    /**
     * @Route("/linkTwig" , name="twig_link")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function lienLinkAction(){
        return $this->render('@App/exoTwigExtends/extend_link.html.twig');
    }
}
