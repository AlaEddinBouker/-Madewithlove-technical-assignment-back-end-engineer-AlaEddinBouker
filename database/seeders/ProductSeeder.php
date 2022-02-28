<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            [
                'name' => 'joint 8mm lateral',
                'price' => 10,

            ],
            [
                'name' => 'joint 8mm lateral',
                'price' => 10,

            ],

            [
                'name' => 'joint 8mm lateral',
                'price' => 10,

            ],

            [
                'name' => 'joint 8mm lateral',
                'price' => 10,

            ],

            [
                'name' => 'joint 8mm lateral',
                'price' => 10,

            ],



        ];

        foreach ($products as $record) {
            Product::create($record);
        }
    }
}
