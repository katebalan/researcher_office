<?php


namespace App\Helper\Xlsx;

use App\Entity\IndividualPlan;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Abstract class XlsxHelper
 * @package App\Helper\Xlsx
 */
abstract class XlsxHelper
{
    /** @var Worksheet $sheet */
    protected $sheet;

    /** @var int $line */
    protected $line;

    /** @var int $count */
    protected $count = 1;

    /**
     * @param Worksheet $sheet
     */
    public function setSheet(Worksheet &$sheet): void
    {
        $this->sheet = $sheet;
    }

    /**
     * @param IndividualPlan $individualPlan
     * @return mixed
     */
    abstract public function fillSheet(IndividualPlan $individualPlan): void;

    /**
     * @return mixed
     */
    abstract protected function fillRow(): void;

    abstract protected function clear(): void;
}
