<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ExoResponseController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //méthode de base page index ici le dev.php -> index.html
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/blog1", name="blog1")
     */
    public function  blogAction(){
        // teste la méthode
        var_dump('hello blog');die;
    }


    /**
     * @Route("/poker", name="poker")
     */
    public function pokerAction(){
        $age = 18;

        if ($age>=18){
            var_dump('Faites une mise');die;
        } else {
            var_dump('interdit aux mineurs');die;
        }
    }

    /**
     * @Route("/response", name="response")
     * @return Response
     */
    public function responseAction(){
        return new Response("Vous êtes bien sur un site");
    }

    /**
     * @Route("/html", name="html")
     * @return Response
     */
    public function htmlAction(){
        return $this->render("@App/Default/demohtml.html.twig");
    }

    /**
     * @Route("/poker2", name="poker2")
     */
    public function poker2Action(){
        $age = 18;

        if ($age>=18){
            return $this->render("@App/Default/poker.html.twig");
        } else {
            return $this->render("@App/Default/denyPoker.html.twig");
        }
    }


}
