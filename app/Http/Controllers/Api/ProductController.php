<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Service\ApiService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $apiService;

    public function __construct(ApiService $apiService)
    {
        self::$apiService = $apiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $i = 50;
        while ($i){
            Product::create( [
                'catalog_id' => 'CAT' . rand(1111,9999),
                'title' => 'Laptop-'.$i,
                'description' => 'Powerful laptop for all your computing needs.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1695365793586/fd2574975f45b0b23340355de6454465.png',
                'price' => 999,
                'stock' => 50,
                'status' => 'published',
            ]);
            $i --;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Send whatsapp message here.
     */
    public function sendWpMessage(Request $request)
    {
        $data = $request->all();
        $whatsapNumber = $data['user']['visitor']['phone'][0]['phoneNumber'] ?? null;

        if (! $whatsapNumber){
            return response()->json([
                'status' => true,
                'message' => 'Send Success',
                'data' => "Whatsapp number cannot found"
            ],200);
        }

        $response = self::$apiService->sendSmsInWhatsapp($whatsapNumber);

        return response()->json([
           'status' => true,
           'message' => 'Send Success',
           'data' => $response
        ],200);
    }

    public function sendMultiProduct()
    {
        $apiKey = 'cky6px6gylnajx0epf1xafnxqluh8lyh';
        $source = '573022177303';
        $destination = '8801784124291';
        $messageData = [
            'type' => 'product_details',
            'subType' => 'product_list',
            'catalogId' => '1598140273855917',
            'productId' => '',
            'body' => ['text' => 'body content!'],
            'header' => ['type' => 'text', 'text' => 'header content!'],
            'footer' => ['text' => 'footer content!'],
            'sections' => [
                [
                    'title' => '',
                    'productList' => [
                        ['productId' => 3],
                        ['productId' => 4],
                    ],
                ],
            ],
        ];
        try {
            $response = $this->sendGupshupMessage($apiKey, $source, $destination, $messageData);
            echo 'Response: ' . $response;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function sendGupshupMessage($apiKey, $source, $destination, $messageData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.gupshup.io/sm/api/v1/msg');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        $headers = [
            'apikey: ' . $apiKey,
            'Content-Type: application/x-www-form-urlencoded',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $postData = http_build_query([
            'channel' => 'whatsapp',
            'source' => $source,
            'destination' => $destination,
            'src.name' => 'Gersjdn',
            'message' => json_encode($messageData),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception('cURL error: ' . $error);
        }
        curl_close($ch);
        return $response;
    }
}
