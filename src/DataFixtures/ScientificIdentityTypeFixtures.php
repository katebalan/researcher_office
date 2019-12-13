<?php

namespace App\DataFixtures;

use App\Entity\ScientificIdentityType;
use Doctrine\Common\Persistence\ObjectManager;

class ScientificIdentityTypeFixtures extends BaseFixture
{
    private static $types = [
        [
            'name' => 'OCRID',
            'link' => 'https://orcid.org/'
        ],
        [
            'name' => 'ResearchGate',
            'link' => ''
        ],
        [
            'name' => 'ResearcherID',
            'link' => 'http://www.researcherid.com/rid/'
        ]
    ];

    protected function loadData(ObjectManager $manager)
    {
        foreach (self::$types as $type) {
            $entity = new ScientificIdentityType();
            foreach ($type as $key => $value) {
                $entity->{'set' . ucfirst($key)}($value);
            }
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
