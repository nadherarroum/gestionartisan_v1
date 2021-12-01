<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginAppAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register' , methods: ['GET', 'POST'])]
    public function register(): Response
    {
        $form= $this->createFormBuilder()
            ->add('email',EmailType::class)
            ->add('roles',EntityType::class)
            ->add('password')
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('cin',TextType::class)
            ->add('telephone',TextType::class)
            ->add('address',TextareaType::class)
            ->getForm();
        
        return $this->$this->renderForm('registration/register.html.twig', compact('form'));
    }
}
