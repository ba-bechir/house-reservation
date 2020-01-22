<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends AbstractType
{

    /**
     * Config de base d'un champ
     */
    private function getConfiguration($label, $placeholder)
    {
        return [ 
            'label' => $label,
            'attr' => [
            'placeholder' => $placeholder
            ]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre", "Tapez un titre pour votre annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("Adresse web", "Tapez l'adresse web (automatique)"))
            ->add('coverImage', UrlType::class, $this->getConfiguration("URL de l'image", "Donner l'adresse de l'image"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Description de l'annonce" ))
            ->add('content', TextareaType::class, $this->getConfiguration("Description détaillée", "Tapez la description"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambre(s)", "Nombre de chambres disponibles"))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix par nuit", "Entrer le prix"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}