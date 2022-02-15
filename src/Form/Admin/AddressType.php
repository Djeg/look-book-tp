<?php

namespace App\Form\Admin;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', TextType::class, [
                'label' => 'Libelé :',
            ])
            ->add('street', TextType::class, [
                'label' => 'Nom de la rue :',
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code postal :',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville :',
            ])
            ->add('supplement', TextareaType::class, [
                'label' => 'Suplément d\'adresse :',
                'required' => false,
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'n° de téléphone :',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn success',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
            'method' => 'POST',
        ]);
    }
}
