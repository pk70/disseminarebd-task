<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert(
            [
                [
                    'name' => 'Dhaka', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Chottrogram', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]
        );
    }
}
