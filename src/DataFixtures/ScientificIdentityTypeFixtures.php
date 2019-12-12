<?php

namespace App\DataFixtures;

use App\Entity\ScientificIdentityType;
use Doctrine\Common\Persistence\ObjectManager;

class ScientificIdentityTypeFixtures extends BaseFixture
{
    private static $types = [
        [
            'name' => 'OCRID',
            'url' => 'https://orcid.org/'
        ],
        [
            'name' => 'ResearchGate',
            'url' => ''
        ],
        [
            'name' => 'ResearcherID',
            'url' => 'http://www.researcherid.com/rid/'
        ]
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(
            ScientificIdentityType::class, count(self::$types),
            function (ScientificIdentityType $identityType, $count) {
                $identityType->setName(self::$types[$count]);
                $identityType->setCode(str_replace(' ', '_', strtolower(self::$types[$count])));
            }
        );

        $manager->flush();
    }
}
