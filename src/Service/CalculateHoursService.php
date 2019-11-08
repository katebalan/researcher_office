<?php


namespace App\Service;


use App\Entity\Lesson;
use App\Entity\LessonType;

/**
 * Class CalculateHoursService
 * @package App\Service
 * @author kate@inuits.eu
 */
class CalculateHoursService
{
    /**
     * @var float $generalHours
     */
    private $generalHours;

    /**
     * @var array $lessons
     */
    private $lessons = [];

    /**
     * @var array $simpleLessons
     */
    private $simpleLessons = [];

    /**
     * @var array $controlLessons
     */
    private $controlLessons = [];

    /**
     * @var array $statistics
     */
    private $statistics = [];

    /**
     * CalculateHoursService constructor.
     */
    public function __construct()
    {
        $this->generalHours = 0.0;
    }

    /**
     * @param $lessons
     */
    public function setLessons($lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * @return float
     */
    public function getGeneralHours()
    {
        return $this->generalHours;
    }

    /**
     * @return array
     */
    public function getSimpleLessons()
    {
        return $this->simpleLessons;
    }

    /**
     * @return array
     */
    public function getControlLessons()
    {
        return $this->controlLessons;
    }

    /**
     * @return array
     */
    public function calculate()
    {
        $this->generalHours = $this->calculateHours($this->lessons);
        $this->writeStatistic('general_hours', $this->generalHours);

        $this->transformLessons();

        /** @var LessonType $type['type'] */
        foreach ($this->simpleLessons as &$type) {
            $hours = $this->calculateHours($type['items']);
            $type['hours'] = $hours;
            $this->writeStatistic($type['type']->getNameCanonical(), $hours);
        }

        foreach ($this->controlLessons as &$type) {
            $hours = $this->calculateHours($type['items']);
            $type['hours'] = $hours;
            $this->writeStatistic($type['type']->getNameCanonical(), $hours);
        }

        return $this->statistics;
    }

    private function transformLessons(): void
    {
        foreach($this->lessons as $lesson) {
            /** @var LessonType $type */
            $type = $lesson->getType();

            if ($type->getIsControl()) {
                $this->controlLessons[$type->getId()]['type'] = $type;
                $this->controlLessons[$type->getId()]['items'][] = $lesson;
                $this->controlLessons[$type->getId()]['count'] = count($this->controlLessons[$type->getId()]['items']);
            } else {
                $this->simpleLessons[$type->getId()]['type'] = $type;
                $this->simpleLessons[$type->getId()]['items'][] = $lesson;
                $this->simpleLessons[$type->getId()]['count'] = count($this->simpleLessons[$type->getId()]['items']);
            }
        }
    }

    private function calculateHours($array)
    {
        $hours = 0;

        /** @var Lesson $item */
        foreach ($array as $item) {
            $hours += $item->getHours();
        }

        return $hours;
    }

    private function writeStatistic($key, $value)
    {
        $this->statistics[$key] = $value;
    }
}
