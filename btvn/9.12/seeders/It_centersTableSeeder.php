<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class It_centersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('it_center')->insert([
                'name'=>$faker->company(),
                'location'=>$faker->address(),
                'contact_email'=>$faker->email(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        //
    }
}