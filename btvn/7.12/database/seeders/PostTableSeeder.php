<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Models\Post;
use Illuminate\Support\Facades\DB;
 
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //
        for($i =0; $i<50; $i++){
            DB::table('posts')->insert([
                'title' => $faker->sentence(6,true),
                'content' => $faker->paragraph(20,true)
            ]);
        }
    }
}
