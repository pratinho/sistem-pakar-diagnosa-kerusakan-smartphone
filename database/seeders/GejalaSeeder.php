<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('gejalas')->insert([
            ['nama_gejala' => 'Sinyal Hilang', 'kode_gejala' => 'G1'],
            ['nama_gejala' => 'Sinyal Lemah', 'kode_gejala' => 'G2'],
            ['nama_gejala' => 'Stuck Logo', 'kode_gejala' => 'G3'],
            ['nama_gejala' => 'Mati Total', 'kode_gejala' => 'G4'],
            ['nama_gejala' => 'Tidak Bisa di Cas', 'kode_gejala' => 'G5'],
            ['nama_gejala' => 'Fake Charging', 'kode_gejala' => 'G6'],
            ['nama_gejala' => 'LCD Tidak Bisa Tampil', 'kode_gejala' => 'G7'],
            ['nama_gejala' => 'Blank  Hitam', 'kode_gejala' => 'G8'],
            ['nama_gejala' => 'Tidak Bisa di Sentuh', 'kode_gejala' => 'G9'],
            ['nama_gejala' => 'Baterai Gembung', 'kode_gejala' => 'G10'],
            ['nama_gejala' => 'Fuse Baterai Lemah', 'kode_gejala' => 'G11'],
            
        ]);
    }
    
}
