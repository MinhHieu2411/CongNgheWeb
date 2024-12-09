<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemaId = DB::table('cinemas')->pluck('id')->toArray();
        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('movies')->insert([
                'title'=>$faker->sentence(2, true),
                'director'=>$faker->name(),
                'release_date'=>$faker->date(),
                'duration'=>$faker->numberBetween(120, 240),
                'cinema_id'=>$faker->randomElement($cinemaId),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }
}
