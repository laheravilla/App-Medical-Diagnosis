<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    const AGE_RANGE = ['15-17', '18-24', '25-34', '35-49', '50-65', '+65'];
    const SOCIAL_STATUS = ['married', 'divorced', 'widow', 'single'];
    const HABITS = ['smoking', 'drinking', 'sleeping', 'sport', 'medicaments', 'chimical_exposition'];
    const FAVORITE_BREAKFAST = ['french breakfast', 'green juice', 'porridge', 'fruits mix'];
    const FAVORITE_DRINK = ['caffeinated drink', 'alcoholic drinks', 'nothing special'];
    const CLINICAL_HISTORY = [
        'digestive system',
        'diabetes',
        'endometriosis',
        'overweight',
        'rheumatoid arthritis',
        'lupus',
        'psoriasis',
        'cancer'
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setEmail($faker->email);
            $user->setRoles(['ROLE_USER']);
            $user->setAgeRange($faker->randomElement(self::AGE_RANGE));
            $user->setWeight($faker->randomFloat(1, 40, 250));
            $user->setHeight($faker->randomFloat(1, 120, 250));
            $user->setNumberOfChildren($faker->randomElement([1, 2, 3]));
            $user->setGender($faker->randomElement(['male', 'female']));
            $user->setSocialStatus($faker->randomElement(self::SOCIAL_STATUS));
            $user->setHabits($faker->randomElements(self::HABITS, 6));
            $user->setFavoriteBreakfast($faker->randomElement(self::FAVORITE_BREAKFAST));
            $user->setFavoriteDrink($faker->randomElement(self::FAVORITE_DRINK));
            $user->setFamilyClinicalHistory($faker->randomElements(self::CLINICAL_HISTORY, 8));
            $user->setUserClinicalHistory($faker->randomElements(self::CLINICAL_HISTORY, 8));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
