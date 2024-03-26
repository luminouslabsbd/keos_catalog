<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Service\ApiService;
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
        return "Hello World";
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
}
