<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class HomeController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view("pages.dashboard", $data);
    }

    public function modifyDocx()
    {
        $data = [
            'title' => 'Docx',
            'assessedEntity' => [
                "Company name:" => "COMPANYNAME",
                "DBA (doing business as):" => "DOB",
                "Mailing address:" => "MAILLINGADDRESS",
                "Company main website:" => "COMPANYMAINWEBSITE",
                "Contact name:" => "CONTRACTNAME",
                "Contact title:" => "CONTRACTTITLE",
                "Contact phone number:" => "CONTRACTPHONENUMBER",
                "Contact e-mail address:" => "CONTRACTEMAILADDRESS",
                'Indicate whether a Customized Approach was used:' => 'CUSTOMIZEDAPPROACHWASUSED',
                'Indicate whether a Compensating Control was used:' => 'COMPENSATIOGCONTROLWASUSED',
            ],
            'dateTimeframeAssessment' => [
                'Date of Report:' => [
                    'name' => 'dateReport',
                    'type' => 'text',
                ],
                'Date assessment began:' => [
                    'name' => 'dateAssessmentBegan',
                    'type' => 'date',
                ],
                'Date assessment ended:' =>[
                    'name'=>'dateAssessmentEnded',
                    'type'=>'date',
                ],
                'Identify the date(s) spent onsite at the assessed entity.' => [
                    'name' => 'IdentifyTheDatesSpent',
                    'type' => 'date'
                ]
            ],
        ];
        return view('pages.docx', $data);
    }

    public function submitDocxInfo(Request $request)
    {
        $requestData = $request->except(['_token']);
        $templateProcessor = new TemplateProcessor(public_path('file.docx'));

        foreach ($requestData as $key => $value) {
            $defaultValue = $value == null ? '<Enter Response Here>' : $value;
            $templateProcessor->setValue($key, $defaultValue);
        }

        try {
            $tempFilePath = tempnam(sys_get_temp_dir(), 'PHPWord') . '.docx';
            $templateProcessor->saveAs($tempFilePath);

            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="modified_template.docx"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($tempFilePath));

            readfile($tempFilePath);
            unlink($tempFilePath);
            return redirect()->back();
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            echo "Error saving document: " . $e->getMessage();
            var_dump($e->getTrace());
        }
    }
}
