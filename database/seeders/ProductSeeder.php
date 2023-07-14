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
        $product = new Product();
        $product->product_name="Laptop";
        $product->product_description="This very good laptop";
        $product->photo="01.jpg";
        $product->price=800;
        $product->save();
    }
}
