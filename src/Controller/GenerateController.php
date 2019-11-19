<?php

namespace App\Controller;

use App\Entity\IndividualPlan;
use App\Helper\XlsxHelper;
use App\Service\CalculateHoursService;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GenerateController
 * @package App\Controller
 */
class GenerateController extends AbstractController
{
    /**
     * @Route("/generate/workplan/{id}", name="ro_generate_work_plan")
     *
     * @param IndividualPlan $individualPlan
     * @param XlsxHelper $helper
     * @return BinaryFileResponse
     * @throws Exception
     */
    public function index(IndividualPlan $individualPlan, XlsxHelper $helper)
    {
        $reader = new XlsxReader();
        try {
            $spreadsheet = $reader->load($helper->getTemplate());
        } catch (Exception  $e) {
            throw $e;
        }

        /* @var $sheet Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $helper->fillDisciplineSheet($sheet, $individualPlan);

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
