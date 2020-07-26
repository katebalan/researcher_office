<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Entity\Individual\Plan;
use App\Helper\IndividualPlanHelper;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GenerateController
 * @package App\Controller
 * @Route("/generate/")
 */
class GenerateController extends AbstractController
{
    /**
     * @Route("workplan/{id}", name="ro_generate_work_plan")
     *
     * @param Plan $individualPlan
     * @param IndividualPlanHelper $helper
     * @return BinaryFileResponse
     * @throws Exception
     */
    public function workPlan(Plan $individualPlan, IndividualPlanHelper $helper)
    {
        $reader = new XlsxReader();
        try {
            $spreadsheet = $reader->load($helper->getTemplate());
        } catch (Exception  $e) {
            throw $e;
        }

        $helper->generateIndividualPlan($spreadsheet, $individualPlan);
        $writer = new XlsxWriter($spreadsheet);

        // Create a Temporary file in the system
        $fileName = sprintf('%06d', $individualPlan->getId()) . '.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
 * @Route("disciplinecredit/{id}", name="ro_generate_discipline_program")
 */
    public function disciplineProgram(Request $request, Discipline $discipline)
    {
        $publicResourcesFolderPath = $this->getParameter('projectDir') . '/templates/files/';
        $filename = "oop-rp.pdf";

        return new BinaryFileResponse($publicResourcesFolderPath.$filename);
    }

    /**
     * @Route("creditmodule/{id}", name="ro_generate_credit_module_program")
     */
    public function creditModule(Request $request, Discipline $discipline)
    {
//        // Create a new Word document
//        $phpWord = new PhpWord();
//
//        /* Note: any element you append to a document must reside inside of a Section. */
//
//        // Adding an empty Section to the document...
//        $section = $phpWord->addSection();
//        // Adding Text element to the Section having font styled by default...
//        $section->addText(
//            '"Learn from yesterday, live for today, hope for tomorrow. '
//            . 'The important thing is not to stop questioning." '
//            . '(Albert Einstein)'
//        );
//
//        // Saving the document as OOXML file...
//        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
//
//        // Create a temporal file in the system
//        $fileName = 'hello_world_download_file.docx';
//        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
//
//        // Write in the temporal filepath
//        $objWriter->save($temp_file);
//
//        // Send the temporal file as response (as an attachment)
//        $response = new BinaryFileResponse($temp_file);
//        $response->setContentDisposition(
//            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
//            $fileName
//        );
//
//        return $response;
        $publicResourcesFolderPath = $this->getParameter('projectDir') . '/templates/files/';
        $filename = "oop-np.pdf";

        return new BinaryFileResponse($publicResourcesFolderPath.$filename);
    }
}
