<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0;$i<20;$i++){
            DB::table('computers')->insert([
                'computer_name'=>$faker->firstNameMale(),
                'model'=>$faker->firstNameFemale(),
                'operating_system'=>$faker->linuxPlatformToken(),
                'processor'=>$faker->linuxProcessor(),
                'memory'=>$faker->numberBetween(4,16),
                'available'=>$faker->boolean(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        //
    }
}
