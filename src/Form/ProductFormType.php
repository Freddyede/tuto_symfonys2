<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{
    TextType,TextareaType, IntegerType,SubmitType
};
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Price'
                ]
            ])
            ->add('source', TextareaType::class)
            ->add('alt', TextType::class)
            ->add('user', EntityType::class,[
                'class' => User::class,
                'choice_label'=>'name'
            ])
            ->add('submit',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
