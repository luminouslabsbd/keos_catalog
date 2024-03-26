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
                'image' => 'laptop.jpg',
                'price' => 999,
                'stock' => 50,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT002',
                'title' => 'Smartphone',
                'description' => 'The latest smartphone with advanced features.',
                'image' => 'smartphone.jpg',
                'price' => 799,
                'stock' => 100,
                'status' => 'published',
            ],
            // Add more products here
            [
                'catalog_id' => 'CAT003',
                'title' => 'Headphones',
                'description' => 'High-quality headphones for an immersive audio experience.',
                'image' => 'headphones.jpg',
                'price' => 149,
                'stock' => 30,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT004',
                'title' => 'Smartwatch',
                'description' => 'Stay connected with the latest smartwatch technology.',
                'image' => 'smartwatch.jpg',
                'price' => 299,
                'stock' => 20,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT005',
                'title' => 'Tablet',
                'description' => 'Portable tablet for work and entertainment on the go.',
                'image' => 'tablet.jpg',
                'price' => 499,
                'stock' => 15,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT006',
                'title' => 'Camera',
                'description' => 'Capture moments with precision and clarity.',
                'image' => 'camera.jpg',
                'price' => 599,
                'stock' => 25,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT007',
                'title' => 'Gaming Console',
                'description' => 'Experience gaming like never before with the latest console.',
                'image' => 'console.jpg',
                'price' => 399,
                'stock' => 10,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT008',
                'title' => 'Wireless Speakers',
                'description' => 'Enjoy wireless audio streaming with premium speakers.',
                'image' => 'speakers.jpg',
                'price' => 199,
                'stock' => 40,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT009',
                'title' => 'External Hard Drive',
                'description' => 'Expand your storage capacity with a reliable external hard drive.',
                'image' => 'hard_drive.jpg',
                'price' => 129,
                'stock' => 50,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT010',
                'title' => 'Wireless Mouse',
                'description' => 'Enhance your productivity with a wireless mouse.',
                'image' => 'mouse.jpg',
                'price' => 49,
                'stock' => 60,
                'status' => 'published',
            ],
        ];


        foreach ($products as $product){
            Product::create($product);
        }

    }
}
