<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ExoTwigExtends extends Controller
{
    /**
     * @Route("/extendTwig/{isaside}", name="twig_extends", defaults={"isaside"="false"})
     */
    public function extendTwigAction($isaside){

        return $this->render( "@App/exoTwigExtends/extend.html.twig",
            [
                'isaside' => $isaside,
            ]
        );
    }
}