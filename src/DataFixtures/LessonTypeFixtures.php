<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\LessonType;
use Doctrine\Persistence\ObjectManager;

class LessonTypeFixtures extends BaseFixture
{
    private static $lessonType = [
        [
            'name' => 'Лекція',
            'nameCanonical' => 'lecture',
            'namePlural' => 'Лекції',
            'isControl' => 0,
            'isEvaluated' => 0,
            'defaultHours' => 2,
        ],
        [
            'name' => 'Лабораторна робота',
            'nameCanonical' => 'laboratory_work',
            'namePlural' => 'Лабораторні роботи',
            'isControl' => 0,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Контрольна робота',
            'nameCanonical' => 'control_work',
            'namePlural' => 'Контрольні роботи',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Курсова робота',
            'nameCanonical' => 'term_paper',
            'namePlural' => 'Курсові роботи',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Екзамен',
            'nameCanonical' => 'exam',
            'namePlural' => 'Екзамени',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Залік',
            'nameCanonical' => 'credit',
            'namePlural' => 'Заліки',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Диференційний залік',
            'nameCanonical' => 'differentiated_credit',
            'namePlural' => 'Диференційні заліки',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Практичне заняття',
            'nameCanonical' => 'practice',
            'namePlural' => 'Практичні заняття',
            'isControl' => 0,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Курсовий проект',
            'nameCanonical' => 'coursework',
            'namePlural' => 'Курсові проекти',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Розрахунково–графічна робота',
            'nameCanonical' => 'settlement_and_graphic_work',
            'namePlural' => 'Розрахунково-графічні роботи',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'ДКР',
            'nameCanonical' => 'dcr',
            'namePlural' => 'ДКР',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Реферат',
            'nameCanonical' => 'abstract',
            'namePlural' => 'Реферати',
            'isControl' => 1,
            'isEvaluated' => 1,
            'defaultHours' => null,
        ],
        [
            'name' => 'Консультація',
            'nameCanonical' => 'consultation',
            'namePlural' => 'Консультації',
            'isControl' => 0,
            'isEvaluated' => 0,
            'defaultHours' => 2,
        ],
    ];

    protected function loadData(ObjectManager $manager): void
    {
        foreach (self::$lessonType as $lessonType) {
            $entity = new LessonType();
            foreach ($lessonType as $key => $value) {
                $entity->{'set' . \ucfirst($key)}($value);
            }
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
