<?php

namespace App\Service;

class ApiService
{
    public function sendSmsInWhatsapp($data)
    {

// API endpoint URL
        $url = "https://api.gupshup.io/sm/api/v1/msg";

// API key
        $apiKey = "cky6px6gylnajx0epf1xafnxqluh8lyh";

// Data to be sent
        $data = array(
            'channel' => 'WhatsApp',
            'source' => '573022177303',
            'destination' => $data,
            'message' => json_encode(array(
                "type" => "product_details",
                "subType" => "product",
                "catalogId" => "2676589475826894",
                "productId" => "xesw76jin3",
                "body" => array(
                    "text" => "body content!"
                ),
                "footer" => array(
                    "text" => "footer content!"
                )
            )),
            'src.name' => 'CoKeos4App'
        );

        return $data;

// Initialize cURL
        $ch = curl_init($url);

// Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'apikey: ' . $apiKey
        ));

// Execute the request
        $response = curl_exec($ch);

// Check for errors
        if(curl_error($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

// Close cURL session
        curl_close($ch);

// Print the response
        echo $response;
    }


}
