<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Price;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i = 0; $i<100; $i++){
        $product = new Product();
        $product->product_name = $faker->text(10);
        $product->description = $faker->text(1000);
        $product->user_id = rand(1, 3);
        $product->save();
        $price = new Price();
        $price->value = rand(1, 999);
        $product->prices()->save($price);
        $price = new Price();
        $price->value = rand(1, 999);
        $product->prices()->save($price);
        $product->vendors()->attach(rand(1, 10));
        }
    }
}
