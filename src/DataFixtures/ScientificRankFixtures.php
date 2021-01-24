<?php

namespace App\DataFixtures;

use App\Entity\ScientificRank;
use Doctrine\Persistence\ObjectManager;

class ScientificRankFixtures extends BaseFixture
{
    private static $ranks = [
        [
            'name' => 'Асистент',
            'shortName' => 'ас.'
        ],
        [
            'name' => 'Cтарший викладач',
            'shortName' => 'ст.н.сп.'
        ],
        [
            'name' => 'Доцент',
            'shortName' => 'доц.'
        ],
        [
            'name' => 'Професор',
            'shortName' => 'проф.'
        ]
    ];

    protected function loadData(ObjectManager $manager)
    {
        foreach (self::$ranks as $rank) {
            $entity = new ScientificRank($rank['name'], $rank['shortName']);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
