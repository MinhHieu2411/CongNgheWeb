<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker::create();
        $libId = DB::table('libraries')->pluck('id')->toArray();
        //
        for ($i = 0; $i < 50; $i++) {
            DB::table('books')->insert([
                'title'=>$faker->title,
                'author'=>$faker->name(),
                'publication_year'=>$faker->year(),
                'genre'=>$faker->firstNameFemale(),
                'library_id'=>$faker->randomElement($libId),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
