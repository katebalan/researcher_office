<?php

declare(strict_types=1);

namespace App\Helper\Xlsx;

use App\Entity\Discipline;
use App\Entity\Individual\Plan;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

/**
 * Class XlsxDisciplineHelper.
 */
final class XlsxDisciplineHelper extends XlsxHelper
{
    /** @var array */
    public static $skeleton = [
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
        'general_hours' => 'BN',
    ];

    /** @var CalculateHoursService */
    private $hoursService;

    /** @var Discipline */
    private $discipline;

    /**
     * XlsxDisciplineHelper constructor.
     */
    public function __construct(CalculateHoursService $hoursService)
    {
        $this->hoursService = $hoursService;
        $this->line = 8;
    }

    public function setDiscipline(Discipline $discipline): void
    {
        $this->discipline = $discipline;
    }

    /**
     * @throws Exception
     */
    public function fillSheet(Plan $individualPlan): void
    {
        $this->clear();

        // TODO rewrite generation of the file here
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

    protected function fillRow(): void
    {
        $this->sheet->setCellValue('B' . $this->line, $this->count++);
        $this->sheet->setCellValue('C' . $this->line, $this->discipline->getName());
        $this->sheet->setCellValue('E' . $this->line, $this->discipline->getDepartment());
        $this->sheet->setCellValue('F' . $this->line, $this->discipline->getCourse());
        $this->sheet->setCellValue('M' . $this->line, $this->discipline->getGroupCodes());

        $this->hoursService->setLessons($this->discipline->getLessons());
        foreach ($this->hoursService->calculate() as $type => $value) {
            $this->sheet->setCellValue(self::$skeleton[$type] . $this->line, $value);
        }

        $this->line++;
    }

    protected function clear(): void
    {
        $this->line = 8;
        $this->count = 1;
    }

    /**
     * @param $semester
     *
     * @throws Exception
     */
    private function fillPartConclusion($semester): void
    {
        $this->sheet->setCellValue('C' . $this->line, 'Разом за ' . \str_repeat('І', $semester) . ' семестр');
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
}
