<?php
namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use App\Entity\Article;
use App\Form\Blog\ArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class ArticleController
 * @package App\Controller
 */

class ArticleController extends AbstractController

{
    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return Response
     * @Route("/blog/article/id/{id}", name="blog_article_id")
     */
    public function showOneArticleId(ArticleCRUD $articleCRUD, $id)
    {
        /**
         * @var Article $article
         */
        $article = $articleCRUD->getOneByID($id);
        return $this->render("/blog/articles/one.html.twig",['article' => $article]);
    }

    /**
     * @param ArticleCRUD $articleCRUD
     * @return Response
     * @Route("/blog/article/", name="liste_article")
     */
    public function showAllArticle(ArticleCRUD $articleCRUD)
    {
        // Get articles
        $articles = $articleCRUD->getAll();
        return $this->render("/blog/articles/all.html.twig",
                [
                    'articles' => $articles
                ]
    );
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article/update", name="article_update")
     */
    public function updateArticle(Request $request)
    {
    return $this->render("/blog/articles/update.html.twig");
    }

    /**
     * @param Request $request
     * @param Article $articleCRUD
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/blog/article/delete/{id}", name="article_delete")
     */
    public function deleteArticle(Request $request, ArticleCRUD $articleCRUD, $id)
    {
        //Get auteur
        $article = $articleCRUD->getOneByID($id);
        //Delete
        $articleCRUD->delete($article);
        //redirect
        return $this->redirectToRoute('liste_article');
    }



    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article/create", name="article_create")
     */
    public function createArticle(Request $request, ArticleCRUD $articleCRUD)
    {
        // create empty auteur
        $article = new Article();
        // create form
        $form = $this->createForm(
            ArticleFormType::class,
            $article
        );
        // Handle form handleRequest= submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime( 'now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $article->setDate($date);
            // Persist
            $articleCRUD->add($article);

            //redirect
            return $this->redirectToRoute('liste_article');
        }
        // create and return template
        return $this->render("/blog/articles/create.html.twig",
        [
        'articleForm' => $form->createView()
        ]
        );
    }


    }
