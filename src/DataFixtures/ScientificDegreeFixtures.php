<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\ScientificDegree;
use Doctrine\Persistence\ObjectManager;

class ScientificDegreeFixtures extends BaseFixture
{
    private static $degrees = [
        [
            'name' => 'Кандидат технічних наук',
            'shortName' => 'к.т.н.',
        ],
        [
            'name' => 'Доктор технічних наук',
            'shortName' => 'д.т.н.',
        ],
    ];

    protected function loadData(ObjectManager $manager): void
    {
        foreach (self::$degrees as $degree) {
            $entity = new ScientificDegree($degree['name'], $degree['shortName']);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
