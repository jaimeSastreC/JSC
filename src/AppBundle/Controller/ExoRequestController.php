<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ExoRequestController extends Controller
{

    /**
     * @Route("/blog", name="blog_params")
     */
    public function paramsUrlAction(Request $request){
        //Request $request crée l'objet , géré par Symfony GET!!!
        //var_dump($request);
        $var = $request->query->get('id');

        // getHost donne infos sur navigateur Client
        $varHost = $request->getHost();
        //var_dump($var);die;
        echo $var . " " . $varHost; die;
    }

    /**
     * @Route("/choix", name="choix_params")
     * @param Request $request
     * @return Response
     */
    public function choixIdAction(Request $request){
        //url requete ?id=18 ou id = 17
        $var_id = $request->query->get('id');

        if ($var_id >=18){
            return $this->render("@App/Default/choixId1.html.twig");
        } else {
            return $this->render("@App/Default/choixIdAutre.html.twig");
        }
    }

    /**
     * @Route("/age", name="age_params")
     * @param Request $request
     * @return Response
     * retourne en fonction des variables get données ex: ?age=18&categorie=party
     */
    public function choixAgeAction(Request $request){
        //url: http://localhost:8080/JSC/web/app_dev.php/age?age=17&categorie=poker
        $var_age = $request->query->get('age');
        $var_categorie = $request->query->get('categorie');

        if ($var_age >=18){
            return new Response("Vous êtes bien sur un site : $var_categorie");
        } else {
            return new Response("Vous n'êtes pas autorisé à aller sur : $var_categorie");
        }
    }

    /**
     * @Route("/blog-beautiful-url/{id}", name="blog_params_placeholder")
     * peut être développé avec regex
     */
    public function myBeautifulUrlAction($id){
        var_dump($id); die;
    }

    //liste d'articles remplaçant un appel base de donnée en array.
    //autre solution: 1 => [ "id" => 1,
    //                "title" => "T-shirt",
    //                "content"=> "my T-shirt"]  puis requête: $articles[1]['titre'].

    private $articles= [
            [
                "id" => 1,
                "title" => "T-shirt",
                "content"=> "my T-shirt"
            ],
            [
                "id" => 2,
                "title" => "hat",
                "content" => "my hat"
            ],
            [
                "id" => 3,
                "title" => "coat",
                "content" => "my coat"
            ]
        ];

    /**
     * @Route("/shopping/{id}" , name="shopping_product")
     */
    public function myShoppingAction($id = 1){
        //page shopping qui selon base $articles fournit pour une référence id, le produit sélectionné. traitement de array
        //var_dump($id);
        $articles = $this->articles;
        // boucle foreach, pour extraire informations d'article;

        foreach($articles as $article){
            //var_dump($article);

            if ($article["id"]== $id){
                return new Response("Vous avez commandé: <br/> titre: " . $article["title"]. "<br> contenu : " . $article["content"]);
            } else {throw $this->createNotFoundException('Support Group doesn\'t exist');}
        }

    }

    /**
     * @Route("/redirect" , name="redirect")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectAction (){
        //return $this->redirect('http://symfony.com/doc');

        //en production va plus vite que redirectToRoute.
        //$url = $this->generateUrl('blog1');
        //return $this->redirect($url);
        return $this->redirectToRoute('poker');
    }


    /**
     * @Route("/validation/{check}", name="validation_bool")
     */
    public function redirectionBoolAction ($check){

        if($check === "true"){
            return $this->redirectToRoute('poker');
        } else {
            return new Response("Vous n'êtes pas auorisé à accéder à la page.");
        }
        // return ($check === "true")? $this->redirectToRoute('poker') : new Response("Vous n'êtes pas auorisé à accéder à la page.");
    }
    
}


/*
 * $article = [
        1 => [
            "id" => "Id1",
            "titre" => "Titre1",
            "content" => "Content1",
        ],
        2 => [
            "id" => "Id2",
            "titre" => "Titre2",
            "content" => "Content2",
        ],
        3 => [
            "id" => "Id3",
            "titre" => "Titre3",
            "content" => "Content3",
        ],
        4 => [
            "id" => "Id4",
            "titre" => "Titre4",
            "content" => "Content4",
        ],
    ];

    return new Response($article[$id]["id"] . ' ' . $article[$id]["titre"]. ' ' .$article[$id]["content"]);
 */
