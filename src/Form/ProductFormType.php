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
            ->add('price', IntegerType::class,[
                'attr'=>[
                    'placeholder'=>'Price',
                    'class'=>'form-control col-6'
                ]
            ])
            ->add('source', TextareaType::class,[
                'attr'=>[
                    'placeholder'=>'Source image',
                    'class'=>'form-control col-6'
                ]
            ])
            ->add('alt', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Alt image',
                    'class'=>'form-control col-6'
                ]
            ])
            ->add('user', EntityType::class,[
                'attr'=>[
                    'class'=>'form-control col-6'
                ],
                'class' => User::class,
                'choice_label'=>'name',
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
