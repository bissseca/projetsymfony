<?php

namespace App\CRUD\Blog;

use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

Class AuteurCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Repository\AuteurRepository|\Doctrine\Common\Persistence\ObjectRepository
     */

    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository('App:Auteur');
    }

    private function persist(Auteur $auteur)
    {
        $this->em->persist($auteur);
        $this->em->flush();
    }

    /**
     * @param Auteur $auteur
     */
    public function add(Auteur $auteur): void
    {
        $this->persist($auteur);
    }

    /**
     * @param Auteur $auteur
     */
    public function update(Auteur $auteur): void
    {
        $this->persist($auteur);
    }

    /**
     * @param int $id
     */
    public function getOneByID(int $id): Auteur
    {
        return $this->repo->find($id);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }

    /**
     * @param Auteur $auteur
     */
    public function delete(Auteur $auteur): void
    {
        $this->em->remove($auteur);
        $this->em->flush();
    }
}

