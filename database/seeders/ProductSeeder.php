<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Molen Original',
                'price' => 1750,
                'image' => 'images/m original.jpg',
                'description' => 'Molen pisang original dengan rasa tradisional yang autentik',
                'category' => 'molen'
            ],
            [
                'name' => 'Molen Coklat',
                'price' => 1750,
                'image' => 'images/m coklat.jpg',
                'description' => 'Molen pisang dengan isian coklat yang lezat',
                'category' => 'molen'
            ],
            [
                'name' => 'Molen Keju',
                'price' => 1750,
                'image' => 'images/m keju.jpg',
                'description' => 'Molen pisang dengan isian keju yang gurih',
                'category' => 'molen'
            ],
            [
                'name' => 'Molen Kacang Hijau',
                'price' => 1750,
                'image' => 'images/m kacang ijo.jpg',
                'description' => 'Molen pisang dengan isian kacang hijau yang manis',
                'category' => 'molen'
            ],
            [
                'name' => 'Onde Original',
                'price' => 1750,
                'image' => 'images/onde original.jpg',
                'description' => 'Onde-onde tradisional dengan isian kelapa dan gula merah',
                'category' => 'onde'
            ],
            [
                'name' => 'Onde Ketan Hitam',
                'price' => 1750,
                'image' => 'images/onde original.jpg',
                'description' => 'Onde-onde dengan isian ketan hitam yang legit',
                'category' => 'onde'
            ],
            [
                'name' => 'Pastel Isi Sayur',
                'price' => 1750,
                'image' => 'images/pastel.jpg',
                'description' => 'Pastel goreng dengan isian sayuran segar',
                'category' => 'pastel'
            ],
            [
                'name' => 'Kue Soes Vanila',
                'price' => 2500,
                'image' => 'images/sus vanila.jpg',
                'description' => 'Kue soes dengan krim vanila yang lembut',
                'category' => 'soes'
            ],
            [
                'name' => 'Kue Soes Taro',
                'price' => 2500,
                'image' => 'images/sus vanila.jpg',
                'description' => 'Kue soes dengan krim taro yang unik',
                'category' => 'soes'
            ],
            [
                'name' => 'Kue Soes Srikaya',
                'price' => 2500,
                'image' => 'images/sus vanila.jpg',
                'description' => 'Kue soes dengan krim srikaya yang manis',
                'category' => 'soes'
            ],
            [
                'name' => 'Kue Soes Ketan Hitam',
                'price' => 2500,
                'image' => 'images/sus vanila.jpg',
                'description' => 'Kue soes dengan krim ketan hitam yang legit',
                'category' => 'soes'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
