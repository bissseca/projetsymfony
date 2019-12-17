<?php

namespace App\Controller;

use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use App\Form\Blog\AuteurFormType;
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
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return Response
     * @Route("/blog/author/id/{id}", name="blog_author_id")
     */
    public function showOneAuteurId(AuteurCRUD $auteurCRUD, $id)
    {
        /**
         * @var Auteur $auteur
         */
        $auteur = $auteurCRUD->getOneByID($id);
        return $this->render("/blog/author/one.html.twig", ['auteur' => $auteur]);
    }

    /**
     * @param Auteur $auteur
     * @return Response
     * @Route("/blog/author", name="liste_auteur")
     */
    public function showAllAuthor(Request $request, AuteurCRUD $auteurCRUD)
    {
        $auteurs = $auteurCRUD->getAll();
        return $this->render("/blog/author/all.html.twig", ['auteurs' => $auteurs]);
    }

    /**
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/blog/author/update/{id}", name="auteur_update")
     */
    public function updateAuteur(Request $request, AuteurCRUD $auteurCRUD, $id)
    {
        //Get auteur
        $auteur = $auteurCRUD->getOneByID($id);
        // create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );
        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist
            $auteurCRUD->update($auteur);

            //redirect
            return $this->redirectToRoute('liste_auteur', ['id' => $id]);
        }
        // create and return template
        return $this->render("/blog/author/update.html.twig", ['auteurForm' => $form->createView()]
        );
    }

    /**
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/blog/author/delete/{id}", name="auteur_delete")
     */
    public function deleteAuteur(Request $request, AuteurCRUD $auteurCRUD, $id)
    {
        //Get auteur
        $auteur = $auteurCRUD->getOneByID($id);
        //Delete
        $auteurCRUD->delete($auteur);
        //redirect
        return $this->redirectToRoute('liste_auteur');
    }

    /**
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     * @Route("/blog/author/create", name="auteur_create")
     */
    public function createAuteur(Request $request, AuteurCRUD $auteurCRUD)
    {
        // create empty auteur
        $auteur = new Auteur();
        // create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );
        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist
            $auteurCRUD->add($auteur);

            //redirect
            return $this->redirectToRoute('liste_auteur');
        }
        // create and return template
        return $this->render("/blog/author/create.html.twig",
            [
                'auteurForm' => $form->createView()
            ]
        );
    }
}