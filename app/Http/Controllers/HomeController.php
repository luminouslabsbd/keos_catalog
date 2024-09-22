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
        flash()->success("Ok kasjdlfjlk");
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
                'Indicate whether a Compensating Control was used:' => 'COMPENSATIOGCONTROLWASUSED'


            ]
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

        // $templateProcessor->setValue('COMPANYNAME', 'John Doe');
        // $templateProcessor->setValue('DOB', '01-01-1996345345');
        // $templateProcessor->setValue('exam_y', 'Passed'); // Replace $checkboxValue with actual value
        // $templateProcessor->setValue('MAILLINGADDRESS', 'This is my value');
        // $templateProcessor->setValue('COMPANYMAINWEBSITE', 'https://www.companywebsite.com');

        try {
            // Define a temporary file path to save the modified document
            $tempFilePath = tempnam(sys_get_temp_dir(), 'PHPWord') . '.docx';

            // Save the modified document to the temporary path
            $templateProcessor->saveAs($tempFilePath);

            // Set headers to trigger download
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="modified_template.docx"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($tempFilePath));

            // Read the file and output it to the browser for download
            readfile($tempFilePath);

            // Delete the temporary file after download
            unlink($tempFilePath);

            flash()->success("Ok kasjdlfjlk");
            return redirect()->back();
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            echo "Error saving document: " . $e->getMessage();
            var_dump($e->getTrace());
        }
    }
}
