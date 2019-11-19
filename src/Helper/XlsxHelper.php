<?php


namespace App\Helper;


use App\Entity\Discipline;
use App\Entity\IndividualPlan;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpKernel\KernelInterface;

class XlsxHelper
{
    /** @var array $skeleton */
    static public $skeleton = [
        'lecture' => 'R',
        'laboratory_work' => 'Z',
        'control_work' => 'AL',
        'term_paper' => 'AT',
        'exam' => 'AD',
        'credit' => 'AH',
        'differentiated_credit' => 'AH',
        'practice' => 'V',
        'coursework' => 'AP',
        'settlement_and_graphic_work' => 'AX',
        'dcr' => 'BB',
        'abstract' => 'BF',
        'consultation' => 'BJ',
        'general_hours' => 'BN'
    ];

    /** @var KernelInterface $kernel */
    private $kernel;

    /** @var CalculateHoursService $hoursService */
    private $hoursService;

    /** @var int $lineDiscipline */
    private $lineDiscipline = 8;

    /** @var int $countDiscipline */
    private $countDiscipline = 1;


    /**
     * XlsxHelper constructor.
     *
     * @param KernelInterface $kernel
     * @param CalculateHoursService $hoursService
     */
    public function __construct(KernelInterface $kernel, CalculateHoursService $hoursService)
    {
        $this->kernel = $kernel;
        $this->hoursService = $hoursService;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->kernel->getProjectDir() . '/templates/files/ind_plan_example.xlsx';
    }

    /**
     * @param Worksheet $sheet
     * @param IndividualPlan $individualPlan
     * @throws Exception
     */
    public function fillDisciplineSheet(Worksheet $sheet, IndividualPlan $individualPlan)
    {
        foreach ($individualPlan->getDisciplines() as $discipline) {
            $this->fillDisciplineRow($sheet, $discipline);
        }
        $this->fillPartConclusion($sheet, 1);

        foreach ($individualPlan->getDisciplines2() as $key => $discipline) {
            $this->fillDisciplineRow($sheet, $discipline);
        }
        $this->fillPartConclusion($sheet, 2);
    }

    /**
     * @param Worksheet $sheet
     * @param Discipline $discipline
     */
    private function fillDisciplineRow(Worksheet &$sheet, Discipline $discipline)
    {
        $sheet->setCellValue('B' . $this->lineDiscipline, $this->countDiscipline++);
        $sheet->setCellValue('C' . $this->lineDiscipline, $discipline->getName());
        $sheet->setCellValue('E' . $this->lineDiscipline, $discipline->getDepartment());
        $sheet->setCellValue('F' . $this->lineDiscipline, $discipline->getCourse());
        $sheet->setCellValue('M' . $this->lineDiscipline, $discipline->getGroupCodes());

        $this->hoursService->setLessons($discipline->getLessons());
        foreach ($this->hoursService->calculate() as $type => $value)
            $sheet->setCellValue(self::$skeleton[$type] . $this->lineDiscipline, $value);

        $this->lineDiscipline++;
    }

    /**
     * @param Worksheet $sheet
     * @param $semester
     * @throws Exception
     */
    private function fillPartConclusion(Worksheet &$sheet, $semester)
    {
        $sheet->setCellValue('C' . $this->lineDiscipline, 'Разом за ' . str_repeat('І', $semester) . ' семестр');
        $sheet->getStyle('C' . $this->lineDiscipline)
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('D' . $this->lineDiscipline . ':D' . ($this->lineDiscipline + 1));
        $sheet->mergeCells('C' . $this->lineDiscipline . ':C' . ($this->lineDiscipline + 1));

        $sheet->setCellValue('E' . $this->lineDiscipline, 'за держбюджетом');
        $sheet->setCellValue('E' . ($this->lineDiscipline + 1), 'за контрактом');
        $sheet->getStyle('E' . $this->lineDiscipline . ':E' . ($this->lineDiscipline + 1))
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('E' . $this->lineDiscipline . ':Q' . $this->lineDiscipline);
        $sheet->mergeCells('E' . ($this->lineDiscipline + 1) . ':Q' . ($this->lineDiscipline + 1));

        $this->lineDiscipline += 2;
    }
}
