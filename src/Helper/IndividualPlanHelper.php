<?php


namespace App\Helper;


use App\Entity\IndividualPlan;
use App\Helper\Xlsx\XlsxDisciplineHelper;
use App\Helper\Xlsx\XlsxWorkHelper;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class IndividualPlanHelper
 * @package App\Helper
 */
class IndividualPlanHelper
{
    /** @var KernelInterface $kernel */
    private $kernel;

    /** @var CalculateHoursService $hoursService */
    private $hoursService;

    /** @var XlsxDisciplineHelper $disciplineHelper */
    private $disciplineHelper;

    /** @var XlsxWorkHelper $workHelper */
    private $workHelper;

    static public $workTypes = [
        '3' => 'methodical_work',
        '4' => 'scientific_work',
        '5' => 'organizational_work',
        '6' => 'disciplinary_work'
    ];

    /**
     * IndividualPlanHelper constructor.
     *
     * @param KernelInterface $kernel
     * @param CalculateHoursService $hoursService
     * @param XlsxDisciplineHelper $disciplineHelper
     * @param XlsxWorkHelper $workHelper
     */
    public function __construct(
        KernelInterface $kernel,
        CalculateHoursService $hoursService,
        XlsxDisciplineHelper $disciplineHelper,
        XlsxWorkHelper $workHelper
    )
    {
        $this->kernel = $kernel;
        $this->hoursService = $hoursService;
        $this->disciplineHelper = $disciplineHelper;
        $this->workHelper = $workHelper;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->kernel->getProjectDir() . '/templates/files/ind_plan_example.xlsx';
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @param IndividualPlan $individualPlan
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function generateIndividualPlan(Spreadsheet &$spreadsheet, IndividualPlan $individualPlan): void
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
