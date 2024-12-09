<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Hardware_devicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $centerId = DB::table('it_center')->pluck('id')->toArray();
        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name'=>$faker->firstNameMale(),
                'type'=>$faker->sentence(1,true),
                'status'=>$faker->boolean(),
                'center_id'=>$faker->randomElement($centerId),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
