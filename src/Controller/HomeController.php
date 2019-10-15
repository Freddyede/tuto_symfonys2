<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Appartements;
use App\Entity\Navbar;

class HomeController extends AbstractController {
    /**
     * @Route("/", name="home")
     */
    public function index() {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/');
        $appartements = $this->getDoctrine()->getRepository(Appartements::class)->findAll();
        return $this->render('home/index.html.twig', [
            'navbar'=>$navbar,
            'users'=>$users,
            'appartement'=>$appartements
        ]);
    }
}
