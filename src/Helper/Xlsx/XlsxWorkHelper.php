<?php

declare(strict_types=1);

namespace App\Helper\Xlsx;

use App\Entity\IndividualPlan;
use App\Entity\IndividualWork;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class XlsxWorkHelper.
 */
final class XlsxWorkHelper extends XlsxHelper
{
    /** @var EntityManager */
    private $em;

    /** @var string */
    private $type;

    /** @var IndividualWork */
    private $work;

    /**
     * XlsxWorkHelper constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->line = 3;
        $this->em = $em;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function fillSheet(IndividualPlan $individualPlan): void
    {
        $this->clear();

        $works = $this->em->getRepository(IndividualWork::class)
            ->findByCanonicalType($this->type);

        foreach ($works as $work) {
            $this->setIndividualWork($work);
            $this->fillRow();
        }
    }

    protected function fillRow(): void
    {
        $this->sheet->setCellValue('B' . $this->line, $this->count++);
        $this->sheet->setCellValue('C' . $this->line, $this->work->getName());
        $this->sheet->setCellValue('D' . $this->line, $this->work->getTernOfExecution());
        $this->sheet->setCellValue('E' . $this->line, $this->work->getMark());

        $this->line++;
    }

    protected function clear(): void
    {
        $this->line = 3;
        $this->count = 1;
    }

    private function setIndividualWork(IndividualWork $individualWork): void
    {
        $this->work = $individualWork;
    }
}
