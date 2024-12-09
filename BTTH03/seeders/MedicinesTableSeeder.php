<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;


class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();
        $medicineForm = ['vien nen', 'vien nang', 'siro'];
        for($i=0;$i<20;$i++){
            DB::table('medicines')->insert([
                'name'=>$faker->sentence(4, true),
                'brand'=>$faker->sentence(2, true),
                'dosage'=>$faker->sentence(2, true),
                'form'=>$faker->randomElement($medicineForm),
                'price'=>$faker->randomFloat(0, 100000),
                'stock'=>$faker->randomNumber(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
