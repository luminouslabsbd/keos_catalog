<?php

namespace App\Service;

class ApiService
{
    public function sendSmsInWhatsapp($data)
    {
        // Ensure that phone number is provided
        if (!isset($data)) {
            return "Error: Phone number is missing.";
        }

        // Prepare the message data
        $messageData = array(
            'type' => 'product_details',
            'subType' => 'product',
            'catalogId' => '2676589475826894',
            'productId' => '1',
            'body' => array(
                'text' => 'body content!'
            ),
            'footer' => array(
                'text' => 'footer content!'
            )
        );

        // Prepare the request data
        $url = 'https://api.gupshup.io/sm/api/v1/msg';
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'apikey: cky6px6gylnajx0epf1xafnxqluh8lyh'
        );
        $postData = array(
            'channel' => 'WhatsApp',
            'source' => '573022177303',
            'destination' => $data,
            'message' => json_encode($messageData),
            'src.name' => 'CoKeos4App'
        );

        // Send the request
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        // Check for errors
        if ($response === false) {
            return "Error: cURL request failed.";
        }

        // Check for specific error response
        $responseData = json_decode($response, true);
        if (isset($responseData['errors'])) {
            return "Error: " . $responseData['errors'][0]['message'];
        }

        return $response;
    }


}
