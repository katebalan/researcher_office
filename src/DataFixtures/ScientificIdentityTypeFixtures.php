<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\ScientificIdentityType;
use Doctrine\Persistence\ObjectManager;

class ScientificIdentityTypeFixtures extends BaseFixture
{
    private static $types = [
        [
            'name' => 'ORCID',
            'link' => 'https://orcid.org/',
        ], // 0000-0002-9079-593X
        [
            'name' => 'Scopus Author ID',
            'link' => 'https://www.scopus.com/authid/detail.uri?authorId=',
        ], // 55817517600
        [
            'name' => 'ResearcherID',
            'link' => 'http://www.researcherid.com/rid/',
        ], // A-9150-2010
        [
            'name' => 'Google Scholar',
            'link' => 'https://scholar.google.com.ua/citations?user=',
        ], // 6Uj6kQ8AAAAJ
    ];

    protected function loadData(ObjectManager $manager): void
    {
        foreach (self::$types as $type) {
            $entity = new ScientificIdentityType();
            foreach ($type as $key => $value) {
                $entity->{'set' . \ucfirst($key)}($value);
            }
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
