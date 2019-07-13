<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => false
            ])
            ->add('lastName', TextType::class, [
                'label' => false
            ])
            ->add('ageRange', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    '15 à 17 ans' => true,
                    '18 à 24 ans' => true,
                    '25 à 34 ans' => true,
                    '35 à 49 ans' => true,
                    '50 à 64 ans' => true,
                    '+65 ans' => true,
                ]
            ])
//            ->add('gender')
//            ->add('socialStatus')
//            ->add('numberOfChildren')
//            ->add('habits')
//            ->add('favoriteBreakfast')
//            ->add('favoriteDrink')
//            ->add('weight')
//            ->add('height')
//            ->add('familyClinicalHistory')
//            ->add('userClinicalHistory')
//            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
