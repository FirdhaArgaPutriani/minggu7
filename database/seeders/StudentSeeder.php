<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nim'           => '2031710171',
            'name'          => 'Firdha Arga Putriani',
            'class'         => 'MI-2E',
            'departement'   => 'JTI',
            'phone'         => '083831585841',
        ]);
        DB::table('students')->insert([
            'nim'           => '2031710039',
            'name'          => 'Hanif Widyantoro',
            'class'         => 'MI-2E',
            'departement'   => 'JTI',
            'phone'         => '087862278323',
        ]);
        DB::table('students')->insert([
            'nim'           => '2031710011',
            'name'          => 'Ichsani Nikken Rahmawati',
            'class'         => 'MI-2E',
            'departement'   => 'JTI',
            'phone'         => '082264052082',
        ]);
    }
}
