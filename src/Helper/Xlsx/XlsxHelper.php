<?php

declare(strict_types=1);

namespace App\Helper\Xlsx;

use App\Entity\Individual\Plan;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Abstract class XlsxHelper.
 */
abstract class XlsxHelper
{
    /** @var Worksheet */
    protected $sheet;

    /** @var int */
    protected $line;

    /** @var int */
    protected $count = 1;

    public function setSheet(Worksheet &$sheet): void
    {
        $this->sheet = $sheet;
    }

    /**
     * @return mixed
     */
    abstract public function fillSheet(Plan $individualPlan): void;

    /**
     * @return mixed
     */
    abstract protected function fillRow(): void;

    abstract protected function clear(): void;
}
