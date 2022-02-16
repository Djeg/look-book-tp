<?php

namespace App\Form\Front;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre email :',
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Mot de passe :',
                ],
                'second_options' => [
                    'label' => 'Répétez votre mot de passe :',
                ],
                'required' => $options['mode'] === 'create',
                'mapped' => false,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => false,
            ])
            ->add('username', TextType::class, [
                'label' => 'Votre alias :',
                'required' => false,
            ])
            ->add('profilePicture', UrlType::class, [
                'label' => 'Image de profile :',
            ])
            ->add('submit', SubmitType::class, [
                'label' => $options['mode'] === 'edit'
                    ? 'Envoyer'
                    : 'S\'inscrire',
                'attr' => [
                    'class' => 'btn success',
                ]
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($options) {
                $password = $event->getForm()->get('password')->getData();
                $data = $event->getForm()->getData();

                if (!$password && $options['mode'] === 'edit') {
                    return true;
                }

                $data->setPassword($options['password_encoder']->hashPassword(
                    $data,
                    $password,
                ));
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['password_encoder', 'mode']);
        $resolver->setAllowedValues('mode', ['edit', 'create']);
        $resolver->setAllowedTypes('password_encoder', UserPasswordHasherInterface::class);

        $resolver->setDefaults([
            'data_class' => User::class,
            'method' => 'POST',
            'mode' => 'create',
        ]);
    }
}
