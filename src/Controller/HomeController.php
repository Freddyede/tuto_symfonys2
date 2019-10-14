<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class HomeController extends AbstractController {
    /**
     * @Route("/", name="home")
     */
    public function index() {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('home/index.html.twig', [
            'users'=>$users
        ]);
    }
}
