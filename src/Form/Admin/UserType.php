<?php

namespace App\Form\Admin;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email :',
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Roles :',
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe :',
                'mapped' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Nom :',
                'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom :',
                'required' => false,
            ])
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur :',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'btn',
                ]
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($options) {
                $password = $event->getForm()->get('password')->getData();
                $data = $event->getForm()->getData();

                $data->setPassword($options['password_encoder']->hashPassword(
                    $data,
                    $password,
                ));
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired('password_encoder');
        $resolver->setAllowedTypes('password_encoder', UserPasswordHasherInterface::class);

        $resolver->setDefaults([
            'data_class' => User::class,
            'method' => 'POST',
        ]);
    }
}
