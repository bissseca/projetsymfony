<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller
 */

class ArticleController extends AbstractController

{
    /**
     * @param $id
     * @return Response
     * @Route("/blog/article/{id}", name="blog_article_id")
     */
    function showOneArticleId($id, Request $request)
    {
        $response = new Response();
        $content = "<html><body>ArticleId = $id</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article/", name="liste_article")
     */
    public function showAllArticle(Request $request)
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
     * @Route("/blog/article/update", name="article_update")
     */
    public function updateArticle(Request $request)
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
     * @Route("/blog/article/delete", name="article_delete")
     */
    public function deleteArticle(Request $request)
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
     * @Route("/blog/article/create", name="article_create")
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