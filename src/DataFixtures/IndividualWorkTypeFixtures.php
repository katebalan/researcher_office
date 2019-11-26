<?php

namespace App\DataFixtures;

use App\Entity\IndividualWorkType;
use Doctrine\Common\Persistence\ObjectManager;

class IndividualWorkTypeFixtures extends BaseFixture
{
    private static $types = [
        [
            'name' => 'Methodical work'
        ],
        [
            'name' => 'Scientific work'
        ],
        [
            'name' => 'Organizational work'
        ],
        [
            'name' => 'Disciplinary work'
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        foreach (self::$types as $type) {
            $entity = new IndividualWorkType();
            foreach ($type as $key => $value) {
                $entity->{'set' . ucfirst($key)}($value);
            }
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
