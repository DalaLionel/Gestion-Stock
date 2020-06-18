<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * On déclare des routes avec des annotations Route
     *
     * @Route("/", name="home")
     */
    public function index()
    {
    return $this->render('home.html.twig', ['pseudo'=>'John Doe', 'age'=>57, 'target'=>'your hole', 'weapon'=>'this long thing', 'liste'=>['hello','dear','nibbas']]);
        /*symfony sait déjà que les templates twig sont dans le fichier templates donc on met juste le chemin depuis la base du dossier twig*/
    }

    /**
     * ici on crée une uri test suivie d'un paramètre entre accolades {id}
     * le paramètre entre accolades est dynamique
     * @Route ("/test", name="test")
     */
    public function test(EntityManagerInterface $em)
    {
        //Création d'une entité
        $product=new Product();

        $product
            ->setName('Jeans')
            ->setDescription('Un jean très swag')
            ->setPrice(79.99)
            ->setQuantity(50)
        ;
        //ici l'entité product n'est pas encore enregistrée en base de données
        dump ($product);

        //Emregistrement (insertion)
        // 1 préparer à l'enregistrement d'une entité
        $em->persist($product);
        // 2 Exécuter les requêtes sql
        $em->flush();
        //une fois qu'on a fait flush on exécute ce que
        //fonction de debug
        dd($product);
    }


}
