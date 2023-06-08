<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ThanasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('thanas')->insert(
            [
                [
                    'name' => 'Motijheel', 'id_division' => 1, 'id_district' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Mirzapur', 'id_division' => 1, 'id_district' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Kotoaly', 'id_division' => 2, 'id_district' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]
        );
    }
}
