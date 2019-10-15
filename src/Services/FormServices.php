<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class FormServices {
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function sendForm($form){
        $task = $form->getData();
        $entityManager = $this->em;
        $entityManager->persist($task);
        $entityManager->flush();
    }
}