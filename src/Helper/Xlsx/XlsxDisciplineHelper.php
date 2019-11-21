<?php


namespace App\Helper\Xlsx;


use App\Entity\Discipline;
use App\Entity\IndividualPlan;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Class XlsxDisciplineHelper
 * @package App\Helper\Xlsx
 */
final class XlsxDisciplineHelper extends XlsxHelper
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

    /** @var CalculateHoursService $hoursService */
    private $hoursService;

    /** @var Discipline $discipline */
    private $discipline;

    /**
     * XlsxDisciplineHelper constructor.
     * @param CalculateHoursService $hoursService
     */
    public function __construct(CalculateHoursService $hoursService)
    {
        $this->hoursService = $hoursService;
        $this->line = 8;
    }

    /**
     * @param Discipline $discipline
     */
    public function setDiscipline(Discipline $discipline): void
    {
        $this->discipline = $discipline;
    }

    /**
     * @param IndividualPlan $individualPlan
     * @return void
     * @throws Exception
     */
    public function fillSheet(IndividualPlan $individualPlan): void
    {
        $this->clear();

        foreach ($individualPlan->getDisciplines() as $discipline) {
            $this->setDiscipline($discipline);
            $this->fillRow();
        }
        $this->fillPartConclusion(1);

        foreach ($individualPlan->getDisciplines2() as $key => $discipline) {
            $this->setDiscipline($discipline);
            $this->fillRow();
        }
        $this->fillPartConclusion(2);
    }

    /**
     * @return void
     */
    protected function fillRow(): void
    {
        $this->sheet->setCellValue('B' . $this->line, $this->count++);
        $this->sheet->setCellValue('C' . $this->line, $this->discipline->getName());
        $this->sheet->setCellValue('E' . $this->line, $this->discipline->getDepartment());
        $this->sheet->setCellValue('F' . $this->line, $this->discipline->getCourse());
        $this->sheet->setCellValue('M' . $this->line, $this->discipline->getGroupCodes());

        $this->hoursService->setLessons($this->discipline->getLessons());
        foreach ($this->hoursService->calculate() as $type => $value)
            $this->sheet->setCellValue(self::$skeleton[$type] . $this->line, $value);

        $this->line++;
    }

    /**
     * @param $semester
     * @throws Exception
     */
    private function fillPartConclusion($semester): void
    {
        $this->sheet->setCellValue('C' . $this->line, 'Разом за ' . str_repeat('І', $semester) . ' семестр');
        $this->sheet->getStyle('C' . $this->line)
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $this->sheet->mergeCells('D' . $this->line . ':D' . ($this->line + 1));
        $this->sheet->mergeCells('C' . $this->line . ':C' . ($this->line + 1));

        $this->sheet->setCellValue('E' . $this->line, 'за держбюджетом');
        $this->sheet->setCellValue('E' . ($this->line + 1), 'за контрактом');
        $this->sheet->getStyle('E' . $this->line . ':E' . ($this->line + 1))
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $this->sheet->mergeCells('E' . $this->line . ':Q' . $this->line);
        $this->sheet->mergeCells('E' . ($this->line + 1) . ':Q' . ($this->line + 1));

        $this->line += 2;
    }

    protected function clear(): void
    {
        $this->line = 8;
        $this->count = 1;
    }
}
