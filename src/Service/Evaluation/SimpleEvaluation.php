<?php


namespace App\Service\Evaluation;

/**
 * Class SimpleEvaluation
 * @package App\Service\Evaluation
 * @author kate@inuits.eu
 */
class SimpleEvaluation extends BaseEvaluation
{
    /**
     * @var float $min
     */
    private $min = 0.0;

    /**
     * @var float $max
     */
    private $max;

    /**
     * SimpleEvaluation constructor.
     * @param $max
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * @return float
     */
    public function calculate()
    {
        return $this->max - $this->min;
    }
}
