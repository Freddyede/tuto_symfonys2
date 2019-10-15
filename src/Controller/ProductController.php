<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Produit;
use App\Entity\Navbar;

use App\Form\ProductFormType;
use App\Services\FormServices;

use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("product/", name="products_")
*/
class ProductController extends AbstractController {
    /**
     * @Route("create/{id}", name="create")
     */
    public function index($id, Request $request, FormServices $fservice) {
        if($id == -1){
            $form = $this->createForm(ProductFormType::class,new Produit());
            $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/product/create');
        }else{
            $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/product/edit');
            $product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
            $form = $this->createForm(ProductFormType::class,$this->getDoctrine()->getRepository(Produit::class)->find($id));
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fservice->sendForm($form);
            return $this->redirectToRoute('products_list');
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
        return $this->redirectToRoute("products_list");
    }
    /**
     * @Route("list",name="list")
     */
    public function list(){
        $navbar = $this->getDoctrine()->getRepository(Navbar::class)->getTitre('/product/list');
        return $this->render('product/list.html.twig',[
            'produits'=>$this->getDoctrine()->getRepository(Produit::class)->findAll(),
            'navbar'=>$navbar
        ]);
    }
}
