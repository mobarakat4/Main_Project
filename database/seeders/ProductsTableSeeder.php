<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            //cats
            [
                'name' => 'Siamese',
                'name_ar'=>'Siamese',
                'count'=>10,
                'active'=>1,
                'price' => 79.99,
                'description' => 'this is a description of Siamese Cat',
                'category_id'=>1,
                'image_path'=>'Siamese.webp',
                // Add other columns here
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // //dogs
            [
                'name' => 'cute golden retriever',
                'name_ar'=>'cute-golden-retriever',
                'count'=>10,
                'active'=>1,
                'price' => 59.99,
                'description' => 'cute-golden-retriever',
                'category_id'=>2, 
                'image_path'=>'cute-golden-retriever_144627-26658.jpg', //change
                // Add other columns here
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
        ];
        DB::table('products')->insert($products);
    }
}
