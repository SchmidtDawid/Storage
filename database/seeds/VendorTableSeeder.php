<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i<10; $i++){
        $user = new Vendor();
        $user->name = $faker->company;
        $user->save();
        }
    }
}
