<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 20/11/2018
 * Time: 10:17
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ExoArticlesController extends Controller
{
    public function recentArticlesAction()
    {
        // make a database call or other logic
        // to get the "$max" most recent articles
        $max = 3;
        $articles =
            [
                1=>[
                    'author' => 'Auteur 1',
                    'title' => 'Titre 1',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                2=>[
                    'author' => 'Auteur 2',
                    'title' => 'Titre 1',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                3=>[
                    'author' => 'Auteur 3',
                    'title' => 'Titre 2',
                    'content' => 'Lorem ipsum dolor sit amet'
                ],
                4=>[
                    'author' => 'Auteur 4',
                    'title' => 'Titre 3',
                    'content' => 'Lorem ipsum dolor sit amet'
                ]
            ];

        return $this->render(
            '@App/exoTwigExtends/recent_list.html.twig',
            [
                    'articles' => $articles
            ]
        );
    }
}