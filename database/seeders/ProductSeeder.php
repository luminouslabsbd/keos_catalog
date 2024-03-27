<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'catalog_id' => 'CAT001',
                'title' => 'Laptop',
                'description' => 'Powerful laptop for all your computing needs.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1695365793586/fd2574975f45b0b23340355de6454465.png',
                'price' => 999,
                'stock' => 50,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT002',
                'title' => 'Smartphone',
                'description' => 'The latest smartphone with advanced features.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1708598271715/32290c5e1c04aeeec880c2eb284ce247.png',
                'price' => 799,
                'stock' => 100,
                'status' => 'published',
            ],
            // Add more products here
        ];
        for ($i = 0; $i < 48; $i++) {
            foreach ($products as $product) {
                $newProduct = $product;
                $newProduct['catalog_id'] = 'CAT' . sprintf('%03d', count($products) + 1);
                $products[] = $newProduct;
            }
        }

        foreach ($products as $product){
            Product::create($product);
        }

    }
}
