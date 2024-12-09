<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renterId = DB::table('renters')->pluck('id')->toArray();
        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('laptops')->insert([
                'brand'=>$faker->company(),
                'model'=>$faker->companySuffix(),
                'specifications'=>$faker->sentence(4, true),
                'rental_status'=>$faker->boolean(),
                'renter_id'=>$faker->randomElement($renterId),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
