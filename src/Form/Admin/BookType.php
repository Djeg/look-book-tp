<?php

namespace App\Form\Admin;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Publisher;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre :',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description :',
            ])
            ->add('image', UrlType::class, [
                'label' => 'Image :',
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix :',
            ])
            ->add('publisher', EntityType::class, [
                'label' => 'Maison d\'édition',
                'class' => Publisher::class,
                'multiple' => false,
                'choice_label' => 'name',
            ])
            ->add('reseller', EntityType::class, [
                'label' => 'Revendeur',
                'class' => User::class,
                'multiple' => false,
                'choice_label' => 'email',
            ])
            ->add('authors', EntityType::class, [
                'label' => 'Auteur :',
                'class' => Author::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn success',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
            'method' => 'POST',
        ]);
    }
}
