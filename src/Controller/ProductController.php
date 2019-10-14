<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductFormType;
use App\Entity\Produit;

/**
 * @Route("product/", name="product_")
*/
class ProductController extends AbstractController {
    /**
     * @Route("create/{id}", name="create")
     */
    public function index($id) {
        if($id === -1){
            $form = $this->createForm(ProductFormType::class,new Produit());
        }else{
            $product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
            $form = $this->createForm(ProductFormType::class,$product);
        }    
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'form'=>$form->createView()
        ]);
    }
}
