<?php

namespace App\Controller;

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
    public function liste()
    {
        return $this->render('/product/list.html.twig');
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
