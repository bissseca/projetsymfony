<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuthorController
 * @package App\Controller
 */
class AuthorController extends AbstractController

{
    /**
     * @param $id
     * @return Response
     * @Route("/blog/author/{id}", name="blog_article_id")
     */
    function ShowOneAuthorId($id, Request $request)
    {
        $response = new Response();
        $content = "<html><body>AuthorId = $id</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/author", name="liste_auteur")
     */
    public function ShowAllAuthor(Request $request)
    {
        $response = new Response();
        $content = "<html><body>Liste des articles</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/author/update", name="auteur_update")
     */
    public function UpdateArticle(Request $request)
    {
        $response = new Response();
        $content = "<html><body>Editer l'article</body></html></body>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/author/delete", name="auteur_edit")
     */
    public function DeleteArticle(Request $request)
    {
        $response = new Response();
        $content = "<htm><body>Supprimer l'article<html></body>";
        $response-> setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/author/create", name="auteur_create")
     */

    public function createArticle(Request $request)
    {
        $response = new Response();
        $content = "<htm><body>Creer l'article<html></body>";
        $response-> setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

}
