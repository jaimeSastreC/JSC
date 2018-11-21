<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class exoTwigController extends Controller
{
    /**
     * @Route("/varTwig" , name = "var_twig")
     */
    public function variablesTwigAction(){
        //var_dump('Hello'); die;

       return $this->render(
            "@App/Twig/var.html.twig",
            [
              "test" => "mon message",
              "test2" =>"autre message"
            ]
           /*[
               'list' => [3, 4, 50, 60 ]
           ]*/
        );
    }

    /**
     * @Route("/booltwig" , name = "twig_bool")
     */
    public function boolTwigAction($boolean_var = true){
        //var_dump('test');die;

        return $this->render(
            "@App/Twig/booltwig.html.twig",
            [
                "boolean_key" => $boolean_var,
            ]
            );

    }

    /**
     * @Route("/looptwig" , name= "twig_loop")
     */
    public function loopTwigAction(){
        //var_dump('test');die;
        return $this->render(
            "@App/Twig/loop.html.twig",
            [
                'posts' => [
                    [
                        'title' =>'le titre 1',
                        'content'=>'le contenu 1',
                        'resume' =>'le resumé 1'
                    ],
                    [
                        'title' =>'le titre 2',
                        'content'=>'le contenu 2',
                        'resume' =>'le resumé 2'
                    ],
                    [
                        'title' =>'le titre 3',
                        'content'=>'le contenu 3',
                        'resume' =>'le resumé 3'
                    ],
                ]
            ]
        );

    }

    /**
     * @Route("/articlesCommande/{article}", name = "commande_articles")
     */
    public function commandeArticleAction($article=1){
        //var_dump('test');die;

        $articles = [
            [
                "id" => "Article 1",
                "title" => "Titre 1",
                "content" => "Contenu 1",
            ],
            [
                "id" => "Article 2",
                "title" => "Titre 2",
                "content" => "Contenu 2",
            ],
            [
                "id" => "Article 3",
                "title" => "Titre 3",
                "content" => "Contenu 3",
            ],
            [
                "id" => "Article 4",
                "title" => "Titre 4",
                "content" => "Contenu 4",
            ],
        ];

        return $this->render(
            "@App/Twig/articleCommande.html.twig",
            [
                'article' => $articles[$article]
            ]
        );

    }

    // option 2 :

    /**
     * @Route("/articles/{id}", name="articles")
     */
    public function articlesUrlPlaceHolderAction($id)
    {

        $articles =
            [
                1=>[
                    'id' => 1,
                    'titre' => 'Le Passe-Muret',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                2=>[
                    'id' => 2,
                    'titre' => 'Le Rouge et le Gris',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                3=>[
                    'id' => 3,
                    'titre' => 'J\'irai cracher sur vos sandales',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                4=>[
                    'id' => 4,
                    'titre' => 'Le Corbeau et la Belette',
                    'content' => 'Lorem ipsum dolor sit amet'
                ]
            ];

        if ($id <= count($articles) && $id > '0') {
            return $this->render("@App/Twig/articleCommande.html.twig",
                [
                    'article' => $articles[$id]
                ]
            );
        }   else {
                throw $this->createNotFoundException('Support Group does not exist');
        }
    }
}