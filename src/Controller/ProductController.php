<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductFormType;
use App\Entity\Produit;
use App\Entity\Navbar;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("product/", name="product_")
*/
class ProductController extends AbstractController {
    /**
     * @Route("create/{id}", name="create")
     */
    public function index($id, Request $request) {
        if($id == -1){
            $form = $this->createForm(ProductFormType::class,new Produit());
            $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/product/create');
        }else{
            $product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
            $form = $this->createForm(ProductFormType::class,$product);
            $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/product/edit');
        }
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('product/index.html.twig', [
            'navbar'=>$navbar,
            'controller_name' => 'ProductController',
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route(" remove/{id}", name="remove")
    */
    public function remove($id){
        $remove_product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($remove_product);
        $em->flush();
        return $this->redirectToRoute("home");
    }
}
