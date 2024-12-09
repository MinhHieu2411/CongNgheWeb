<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách các medicine_id hiện có
        $medicineId = DB::table('medicines')->pluck('medicine_id')->toArray();
        //
        for ($i = 0; $i < 50; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineId), //random medicines id
                'quantity' => $faker->numberBetween(1, 100), 
                'sale_date' => $faker->dateTimeThisYear(), 
                'customer_phone'=>$faker->randomFloat(0, 1000,50000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}