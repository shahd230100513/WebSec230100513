<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'LG TV 50"',
            'price' => 4000000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'photo' => 'images/1.jpg', // Path relative to public/
        ]);
        Product::create([
            'name' => 'Samsung Galaxy S21',
            'price' => 12000000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'photo' => 'images/2.jpg', // Path relative to public/
        ]);
    }
}