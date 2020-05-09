<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends AbstractType
{
    /**
     * Config de base d'un champ
     */
    private function getConfiguration($label, $placeholder, $options = [])
    {
        return array_merge( [ 
            'label' => $label,
            'attr' => [
            'placeholder' => $placeholder
            ]
            ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Votre prénom"))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Votre nom"))
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Votre adresse email"))
            ->add('picture', UrlType::class, $this->getConfiguration("Photo de profil", "Url de l'avatar"))
            ->add('hash', PasswordType::class, $this->getConfiguration("Mot de passe", "Votre mot de passe"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Présentez vous"))
            ->add('description', TextareaType::class, $this->getConfiguration("Description détaillée", "Présentez vous en détail"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
