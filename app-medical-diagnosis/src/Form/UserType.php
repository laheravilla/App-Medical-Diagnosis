<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
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
//            ->add('ageRange')
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
