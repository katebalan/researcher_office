<?php

declare(strict_types=1);

namespace App\Helper\Xlsx;

use App\Entity\Individual\Plan;
use App\Entity\Individual\Work;
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

    /** @var Work */
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

    public function fillSheet(Plan $individualPlan): void
    {
        $this->clear();

        $works = $this->em->getRepository(Work::class)
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

    private function setIndividualWork(Work $individualWork): void
    {
        $this->work = $individualWork;
    }
}
