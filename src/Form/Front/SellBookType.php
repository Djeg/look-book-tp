<?php

namespace App\Form\Front;

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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SellBookType extends AbstractType
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
                'label' => 'Maison d\édition :',
                'required' => false,
                'class' => Publisher::class,
                'choice_label' => 'name',
            ])
            ->add('authors', EntityType::class, [
                'label' => 'Auteurs :',
                'multiple' => true,
                'class' => Author::class,
                'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn success',
                ],
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($options) {
                $event
                    ->getForm()
                    ->getData()
                    ->setReseller($options['reseller']);
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired('reseller');
        $resolver->setAllowedTypes('reseller', User::class);

        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
