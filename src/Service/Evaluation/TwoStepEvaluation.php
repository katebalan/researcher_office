<?php


namespace App\Service\Evaluation;


class TwoStepEvaluation extends SimpleEvaluation
{
    /**
     * @var float $min
     */
    private $step;

    /**
     * SimpleEvaluation constructor.
     * @param $max
     * @param $firstStep
     */
    public function __construct($firstStep, $max)
    {
        parent::__construct($max);
        $this->step = $firstStep;
    }

    /**
     * @return float|void
     */
    public function calculate()
    {

    }
}
