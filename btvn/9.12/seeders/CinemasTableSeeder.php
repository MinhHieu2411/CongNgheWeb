<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //
        for ($i = 0; $i < 5; $i++) {
            DB::table('cinemas')->insert([
                'name'=>$faker->company(),
                'location'=>$faker->address(),
                'total_seat'=>$faker->numberBetween(100, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
