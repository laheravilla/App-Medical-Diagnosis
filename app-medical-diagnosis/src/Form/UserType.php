<?php

namespace App\Form;

use App\Entity\SocialStatus;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                    '15 à 17 ans' => '15-17',
                    '18 à 24 ans' => '18-24',
                    '25 à 34 ans' => '25-34',
                    '35 à 49 ans' => '35-49',
                    '50 à 64 ans' => '50-64',
                    '+65 ans' => '+65',
                ]
            ])
            ->add('gender', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Je suis une femme' => 'female',
                    'Je suis un homme' => 'male',
                ]
            ])
            ->add('socialStatus', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Marié(e)' => 'married',
                    'Divorcé(e) ou séparé(e)' => 'divorced',
                    'Veuf(ve)' => 'widow',
                    'Célibataire' => 'single'
                ],
            ])
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
