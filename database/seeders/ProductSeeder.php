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
            [
                'catalog_id' => 'CAT003',
                'title' => 'Headphones',
                'description' => 'High-quality headphones for an immersive audio experience.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1694788105336/a6fa8a6f37494f3f4344b2cc213eba61.png',
                'price' => 149,
                'stock' => 30,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT004',
                'title' => 'Smartwatch',
                'description' => 'Stay connected with the latest smartwatch technology.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1699614580836/8b053ff72e5aabdee8a97f30c9950eb5.png',
                'price' => 299,
                'stock' => 20,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT005',
                'title' => 'Tablet',
                'description' => 'Portable tablet for work and entertainment on the go.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1697687753618/eb5acafad9a8bbba61e2f85e68573f02.png',
                'price' => 499,
                'stock' => 15,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT006',
                'title' => 'Camera',
                'description' => 'Capture moments with precision and clarity.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1687941482994/894efb5ca153f54f35f30380849de8a5.png',
                'price' => 599,
                'stock' => 25,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT007',
                'title' => 'Gaming Console',
                'description' => 'Experience gaming like never before with the latest console.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1652152731858/ade2416b90f547a02b0ae50d76f1ffda.png',
                'price' => 399,
                'stock' => 10,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT008',
                'title' => 'Wireless Speakers',
                'description' => 'Enjoy wireless audio streaming with premium speakers.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1677571100026/4b4a05aa8ec4cd49353eed775c5c6a77.png',
                'price' => 199,
                'stock' => 40,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT009',
                'title' => 'External Hard Drive',
                'description' => 'Expand your storage capacity with a reliable external hard drive.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1682320656809/30adbae0bae4090b9a8198c4a66184b1.png',
                'price' => 129,
                'stock' => 50,
                'status' => 'published',
            ],
            [
                'catalog_id' => 'CAT010',
                'title' => 'Wireless Mouse',
                'description' => 'Enhance your productivity with a wireless mouse.',
                'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1675158861847/50f31315854e9903aaf6279e1551a4ac.png',
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
