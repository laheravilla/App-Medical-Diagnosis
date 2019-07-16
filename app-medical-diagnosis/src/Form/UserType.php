<?php

namespace App\Form;

use App\Entity\SocialStatus;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
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
            ->add('numberOfChildren', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    '1 enfant' => '1',
                    '2 enfants' => '2',
                    '+3 enfants' => '3'
                ]
            ])
            ->add('habits', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Fumer' => 'smoking',
                    'Boire' => 'drinking',
                    'Sommeil' => 'sleeping',
                    'Sport' => 'sport',
                    'Médicaments' => 'medicaments',
                    'Exposition aux chimiques' => 'chimical_exposition',
                    'Rien de spécial'=> false
                ]
            ])
            ->add('favoriteBreakfast', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Croissants, oeufs, tartines, confiture' => 'french breakfast',
                    'Jus vert' => 'green juice',
                    'Porridge, muesli' => 'porridge',
                    'Mélande de fruits' => 'fruits mix',
                ]
            ])
            ->add('favoriteDrink', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Café, thé noir, maté, autre boisson caféinée' => 'caffeinated drink',
                    'Vin, bière, cocktail, autre boisson alcoolique' => 'alcoholic drinks',
                    'Rien de spécial' => 'nothing special',
                ]
            ])
            ->add('weight', RangeType::class, [
                'label' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 200
                ]
            ])
            ->add('height', RangeType::class, [
                'label' => false,
                'attr' => [
                    'min' => 0,
                    'max' => 250
                ]
            ])
            ->add('familyClinicalHistory', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Maladies du système digestif' => 'digestive system',
                    'Diabète' => 'diabetes',
                    'Endométriose' => 'endometriosis',
                    'Surpoids/Obésité' => 'overweight',
                    'Polyarthrite Rhumatoïde' => 'rheumatoid arthritis',
                    'Lupus' => 'lupus',
                    'Psoriasis/Eczéma' => 'psoriasis',
                    'Cancers' => 'cancer',
                    'Aucune' => false
                ]
            ])
            ->add('userClinicalHistory', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Maladies du système digestif' => 'digestive system',
                    'Diabète' => 'diabetes',
                    'Endométriose' => 'endometriosis',
                    'Surpoids/Obésité' => 'overweight',
                    'Polyarthrite Rhumatoïde' => 'rheumatoid arthritis',
                    'Lupus' => 'lupus',
                    'Psoriasis/Eczéma' => 'psoriasis',
                    'Cancers' => 'cancer',
                    'Aucune' => false
                ]
            ])
            ->add('email', TextType::class, [
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
