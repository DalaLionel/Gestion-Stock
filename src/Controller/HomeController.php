<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
     * @Route ("/test/{id}", name="test")
     */
    public function test($id, Request $request, SessionInterface $session)
    {
    return $this->json([
        'id'=>$id,
        'section'=>$request->query->get('section','profil'),
        'session'=>$session->get('user','DefaultUser')
    ]);
    }


}
