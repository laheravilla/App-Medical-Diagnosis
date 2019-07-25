<?php

namespace App\DataFixtures;

use App\Entity\Symptom;
use App\Entity\User;
use App\Service\ArrayRandom;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends BaseFixtures implements DependentFixtureInterface
{
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

    protected function loadData(ObjectManager $manager)
    {
        $arrayRandom = new ArrayRandom();

        $this->createMany(User::class, 100, function (User $user, $count) {
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setEmail($this->faker->email);
            $user->setRoles(['ROLE_USER']);
            $user->setYearOfBirth($this->faker->numberBetween(18, 100));
            $user->setWeight($this->faker->randomFloat(1, 40, 250));
            $user->setHeight($this->faker->randomFloat(1, 120, 250));
            $user->setNumberOfChildren($this->faker->randomElement([1, 2, 3]));
            $user->setGender($this->faker->randomElement(['male', 'female']));
            $user->setSocialStatus($this->faker->randomElement(self::SOCIAL_STATUS));
            $user->setHabits($this->faker->randomElements(self::HABITS, 6));
            $user->setFavoriteBreakfast($this->faker->randomElement(self::FAVORITE_BREAKFAST));
            $user->setFavoriteDrink($this->faker->randomElement(self::FAVORITE_DRINK));
            $user->setFamilyClinicalHistory($this->faker->randomElements(self::CLINICAL_HISTORY, 8));
            $user->setUserClinicalHistory($this->faker->randomElements(self::CLINICAL_HISTORY, 8));

            /** @var Symptom[] $symptoms */
            $symptoms = $this->getRandomReferences(Symptom::class, $this->faker->numberBetween(2, 6));
            foreach ($symptoms as $symptom) {
                $user->addSymptom($symptom);
            }
        });
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SymptomFixtures::class,
        ];
    }
}
