<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to ProductController!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }

    /**
     * @Route ("/product/list", name="liste_produits")
     */
    public function liste(ProductRepository $repository)
    {
        //Avec findAll() on récupère tous les résulats contenus dans le repo
        //$result = $repository->findAll();
        /*Avec findBy(['clé'=>'valeur']) on récupère toutes les entités ayant une clé ayant la valeur fournie*/
        //$result = $repository->findBy(['name'=>'jeans']);
        /*Avec findOneBy(['clé'=>'valeur']) on trouve la première entité qui a la clé de la valeur qu'on veut*/
        //$result = $repository->findOneBy(['name'=>'jeans']);
        //$result = $repository->find(2);
        return $this->render('/product/list.html.twig', ['product_list' => $repository->findAll()]);
    }

    /**
     * @Route ("/product/add", name="ajout_produits")
     */
    public function ajout()
    {
        return $this->render('/product/add.html.twig');

    }

    /**
     * @Route ("/product/{id}/edit", name="modif_produits")
     */
    public function modification($id)
    {
        return $this->render('/product/edit.html.twig');
    }
}
