<?php


namespace App\Service;


use App\Entity\Lesson;

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
     * @return float|null
     */
    public function calculate()
    {
        /** @var Lesson $lesson */
        foreach ($this->lessons as $lesson) {
            $this->generalHours += $lesson->getHours();
        }

        return $this->generalHours;
    }
}
