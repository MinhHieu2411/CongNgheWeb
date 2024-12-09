<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $grade = ['pre-k', 'kindergarten'];
        $room = ['VH1', 'VH2', 'VH3', 'VH4', 'VH5', 'VH6', 'VH7', 'VH8', 'VH9' ];
        //
        for($i=0;$i<20;$i++){
            DB::table('classes')->insert([
                'grade_level'=>$faker->randomElement($grade),
                'room_number'=>$faker->randomElement($room),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
