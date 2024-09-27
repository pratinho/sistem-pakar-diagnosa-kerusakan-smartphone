<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KerusakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('kerusakans')->insert([
        ['nama_kerusakan' => 'IC WTR', 'kode_kerusakan' => 'K1'],
        ['nama_kerusakan' => 'IC CPU', 'kode_kerusakan' => 'K2'],
        ['nama_kerusakan' => 'IC EMMC', 'kode_kerusakan' => 'K3'],
        ['nama_kerusakan' => 'IC POWER', 'kode_kerusakan' => 'K4'],
        ['nama_kerusakan' => 'IC CHARGING', 'kode_kerusakan' => 'K5'],
        ['nama_kerusakan' => 'IC PA', 'kode_kerusakan' => 'K6'],
        ['nama_kerusakan' => 'FULL SHORT', 'kode_kerusakan' => 'K7'],
        ['nama_kerusakan' => 'LCD', 'kode_kerusakan' => 'K8'],
        ['nama_kerusakan' => 'BATERAI', 'kode_kerusakan' => 'K9'],
        ['nama_kerusakan' => 'BACKLIGHT', 'kode_kerusakan' => 'K10'],
        
    ]);
}

}
