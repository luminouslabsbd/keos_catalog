<?php

namespace App\Service;

class ApiService
{
    public function sendSmsInWhatsapp($data): bool|string
    {
        $url = 'https://api.gupshup.io/sm/api/v1/msg';
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'apikey: cky6px6gylnajx0epf1xafnxqluh8lyh'
        );
        $data = array(
            'channel' => 'WhatsApp',
            'source' => '573022177303',
            'destination' => $data->phoneNumber,
            'message' => json_encode(array(
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
            )),
            'src.name' => 'CoKeos4App'
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
