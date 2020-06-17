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
        return $this->json([
            'message'=>'Ceci est la page listant les produits'
        ]);
    }

    /**
     * @Route ("/product/add", name="ajout_produits")
     */
    public function ajout()
    {
        return $this->json([
            'message'=>'Ceci est la page d\'ajout des produits'
        ]);
    }

    /**
     * @Route ("/product/{id}/modification", name="modif_produits")
     */
    public function modification($id)
    {
        return $this->json([
            'message'=>'Ici vous pouvez modifier le produit: '.$id
        ]);
    }
}
