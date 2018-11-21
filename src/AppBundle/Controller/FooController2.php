<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooController2 extends Controller
{

    /**
     * @Route("/foo", name="foo")
     */
    public function testResponseAction(){
        return new Response("je teste ma fonction");
    }

}