<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\User;
use App\Entity\Price;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{
    TextType,TextareaType,SubmitType
};
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price',EntityType::class,[
                'attr'=>[
                    'class'=>'form-control col-6'
                ],
                'class' => Price::class,
                'choice_label'=>'labelPrix',
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
