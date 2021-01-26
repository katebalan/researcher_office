<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\ScientificInterest;
use Doctrine\Persistence\ObjectManager;

class ScientificInterestFixtures extends BaseFixture
{
    private static $interests = [
        'Big data',
        'Computer science',
        'Python',
//        'алгоритми',
        'Web',
        'Design',
        'C++',
        'Data science',
        'Linus',
//        'Бази даних',
        'C#',
        'Android',
//        'Мобільна розробка',
        'Java',
        'Kotlin',
        'iOS',
        'Go',
        'PHP',
        'GameDev',
//        'Розробка ігор',
//        'Математика',
        'DevOps',
//        'Тестування',
        'Blockchain',
        'Delphi',
        'Pascal',
        'Assembler',
//        'Графіка',
    ];

    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(ScientificInterest::class, \count(self::$interests), function (ScientificInterest $interest, $count): void {
            $interest->setName(self::$interests[$count]);
            $interest->setNameCanonical(\str_replace(' ', '_', \strtolower(self::$interests[$count])));
        });

        $manager->flush();
    }
}
