<?php

namespace App\Http\Controllers;

use InvalidArgumentException;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPago extends Controller
    {
        /**
         * @throws InvalidArgumentException
         */
        public function index()
        {
            MercadoPagoConfig::setAccessToken("Test-5212586865938205-052911-6d3bfa4742a3af50c1ce9c93864a5e09-468214226");

            $client = new PreferenceClient();
            $request_options = new RequestOptions();
            $request_options->setCustomHeaders(["X-Idempotency-Key: 34234"]);

            $preference = $client->create( array(
                "title" => "My product",
                "quantity" => 1,
                "unit_price" => 2000
            ));
            echo $preference;


        }


        public function getPayments()
        {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . 'Test-5212586865938205-052911-6d3bfa4742a3af50c1ce9c93864a5e09-468214226',
                ])->post('https://api.mercadopago.com/v1/payments');


                return $response;
                exit();

//            if ($response->successful()) {
//                return response()->json($response->json(), 200);
//            } else {
//                return response()->json([
//                    'error' => 'Unable to fetch payments',
//                    'details' => $response->json(),
//                ], $response->status());
//            }
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

        }

        public function use(): void
        {


            MercadoPagoConfig::setAccessToken("Test-5212586865938205-052911-6d3bfa4742a3af50c1ce9c93864a5e09-468214226");

            $client = new PreferenceClient();
            $request_options = new RequestOptions();
            $request_options->setCustomHeaders(["X-Idempotency-Key: 34234"]);

            $preference = $client->create([
                "items" => array(
                    array(
                        "title" => "My product",
                        "quantity" => 1,
                        "unit_price" => 2000
                    )
                ),
                false
            ]);
            echo $preference;

        }

    }

