<?php

namespace App\Controller;

use App\Entity\IndividualPlan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class GenerateController extends AbstractController
{
    /**
     * @Route("/generate/workplan/{id}", name="ro_generate_work_plan")
     *
     * @param IndividualPlan $individualPlan
     * @return BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function index(IndividualPlan $individualPlan)
    {
//        $inputFileName = './sampleData/example1.xls';
//        $reader = new XlsxReader();
//        $spreadsheet = $reader->load($inputFileName);

        $spreadsheet = new Spreadsheet();

        /* @var $sheet Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('C1', 'І. НАВЧАЛЬНА РОБОТА');
        $sheet->setCellValue('B2', '№ п.п.');
        $sheet->mergeCells('B2:B6');
        $sheet->setCellValue('C2', 'Назва навчальних дисциплін, їх загальний обсяг у годинах');
        $sheet->mergeCells('C2:C6');
        $sheet->setCellValue('D2', 'Обсяг дисциплін за семестр');
        $sheet->mergeCells('D2:D6');
        $sheet->setTitle("Навчальна робота");

        // Create your Office 2007 Excel (XLSX Format)
        $writer = new XlsxWriter($spreadsheet);

        // Create a Temporary file in the system
        $fileName = sprintf('%06d', $individualPlan->getId()) . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
