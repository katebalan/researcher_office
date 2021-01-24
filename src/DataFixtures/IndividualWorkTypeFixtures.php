<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\IndividualWorkType;
use Doctrine\Persistence\ObjectManager;

class IndividualWorkTypeFixtures extends BaseFixture
{
    private static $types = [
        [
            'name' => 'Methodical work',
        ],
        [
            'name' => 'Scientific work',
        ],
        [
            'name' => 'Organizational work',
        ],
        [
            'name' => 'Disciplinary work',
        ],
    ];

    protected function loadData(ObjectManager $manager): void
    {
//        foreach (self::$types as $type) {
//            $entity = new IndividualWorkType();
//            foreach ($type as $key => $value) {
//                $entity->{'set' . ucfirst($key)}($value);
//            }
//            $manager->persist($entity);
//        }
//
//        $manager->flush();
    }
}
