<?php

declare(strict_types=1);

namespace App\Helper;

use App\Entity\Individual\Plan;
use App\Helper\Xlsx\XlsxDisciplineHelper;
use App\Helper\Xlsx\XlsxWorkHelper;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class IndividualPlanHelper.
 */
class IndividualPlanHelper
{
    public static $workTypes = [
        '3' => 'methodical_work',
        '4' => 'scientific_work',
        '5' => 'organizational_work',
        '6' => 'disciplinary_work',
    ];

    /** @var KernelInterface */
    private $kernel;

    /** @var CalculateHoursService */
    private $hoursService;

    /** @var XlsxDisciplineHelper */
    private $disciplineHelper;

    /** @var XlsxWorkHelper */
    private $workHelper;

    /**
     * IndividualPlanHelper constructor.
     */
    public function __construct(
        KernelInterface $kernel,
        CalculateHoursService $hoursService,
        XlsxDisciplineHelper $disciplineHelper,
        XlsxWorkHelper $workHelper
    ) {
        $this->kernel = $kernel;
        $this->hoursService = $hoursService;
        $this->disciplineHelper = $disciplineHelper;
        $this->workHelper = $workHelper;
    }

    public function getTemplate(): string
    {
        return $this->kernel->getProjectDir() . '/templates/files/ind_plan_example.xlsx';
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function generateIndividualPlan(Spreadsheet &$spreadsheet, Plan $individualPlan): void
    {
        /* @var $sheet Worksheet */
        $sheet = $spreadsheet->getSheet(0);
        $this->disciplineHelper->setSheet($sheet);
        $this->disciplineHelper->fillSheet($individualPlan);

        foreach (self::$workTypes as $key => $workType) {
            $sheet = $spreadsheet->getSheet($key);
            $this->workHelper->setSheet($sheet);
            $this->workHelper->setType($workType);
            $this->workHelper->fillSheet($individualPlan);
        }
    }
}
