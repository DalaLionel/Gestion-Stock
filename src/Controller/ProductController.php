<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function ajout(Request $request, EntityManagerInterface $em)
    {
        //Création du formulaire
        $productForm = $this->createForm(ProductFormType::class);
        //on passe la requête au formulaire
        $productForm->handleRequest($request);
        //On vérifie que le formulaire est envoyé et valide
        if ($productForm->isSubmitted()&& $productForm->isValid()){
            //On récupère les données du formulaire
            $product = ($productForm->getData());
            $em->persist($product);
            $em->flush();

            //redirection vers la liste des produits
            return $this->redirectToRoute('liste_produits');

        }
        return $this->render('/product/add.html.twig', ['product_form' =>$productForm->createView()]);


    }

    /**
     * @Route ("/product/{id}/edit", name="modif_produits")
     */
    public function modification($id)
    {
        return $this->render('/product/edit.html.twig');
    }
}
