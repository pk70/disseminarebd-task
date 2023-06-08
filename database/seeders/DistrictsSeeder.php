<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert(
            [
                [
                    'name' => 'Dhaka', 'id_division' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Tangail', 'id_division' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Coxbazar', 'id_division' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]
        );
    }
}
