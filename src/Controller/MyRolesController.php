<?php

namespace App\Controller;

use App\Entity\Roles;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyRolesController extends AbstractController
{
    #[Route('/myroles', name: 'myroles')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->add('Title', EntityType::class, ['class' => Roles::class])
            ->add('UserRole', TextType::class)
            ->getForm()
        ;

        //dd($form->createView());

        return $this->render('my_roles/index.html.twig',[
            'form' => $form ->createView(),
        ]);
    
    }
}
