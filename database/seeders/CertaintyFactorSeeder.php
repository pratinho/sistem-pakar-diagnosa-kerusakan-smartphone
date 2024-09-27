<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CertaintyFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('certainty_factors')->insert([
        ['kode_kerusakan' => 'K1', 'kode_gejala' => 'G1', 'mb' => 0.9, 'md' => 0.3],
        ['kode_kerusakan' => 'K1', 'kode_gejala' => 'G2', 'mb' => 0.8, 'md' => 0.2],
        ['kode_kerusakan' => 'K1', 'kode_gejala' => 'G3', 'mb' => 0.4, 'md' => 0.2],
        ['kode_kerusakan' => 'K2', 'kode_gejala' => 'G4', 'mb' => 0.9, 'md' => 0.2],
        ['kode_kerusakan' => 'K2', 'kode_gejala' => 'G7', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K3', 'kode_gejala' => 'G3', 'mb' => 0.4, 'md' => 0.2],
        ['kode_kerusakan' => 'K3', 'kode_gejala' => 'G4', 'mb' => 0.9, 'md' => 0.2],
        ['kode_kerusakan' => 'K4', 'kode_gejala' => 'G4', 'mb' => 0.8, 'md' => 0.2],
        ['kode_kerusakan' => 'K4', 'kode_gejala' => 'G5', 'mb' => 0.6, 'md' => 0.4],
        ['kode_kerusakan' => 'K5', 'kode_gejala' => 'G5', 'mb' => 0.6, 'md' => 0.4],
        ['kode_kerusakan' => 'K5', 'kode_gejala' => 'G6', 'mb' => 1.0, 'md' => 0.0],
        ['kode_kerusakan' => 'K6', 'kode_gejala' => 'G1', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K6', 'kode_gejala' => 'G2', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K6', 'kode_gejala' => 'G3', 'mb' => 0.4, 'md' => 0.2],
        ['kode_kerusakan' => 'K7', 'kode_gejala' => 'G3', 'mb' => 0.4, 'md' => 0.2],
        ['kode_kerusakan' => 'K7', 'kode_gejala' => 'G4', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K8', 'kode_gejala' => 'G7', 'mb' => 0.8, 'md' => 0.2],
        ['kode_kerusakan' => 'K8', 'kode_gejala' => 'G8', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K8', 'kode_gejala' => 'G9', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K9', 'kode_gejala' => 'G3', 'mb' => 0.4, 'md' => 0.2],
        ['kode_kerusakan' => 'K9', 'kode_gejala' => 'G10', 'mb' => 0.9, 'md' => 0.4],
        ['kode_kerusakan' => 'K9', 'kode_gejala' => 'G11', 'mb' => 0.9, 'md' => 0.4],
        ['kode_kerusakan' => 'K10', 'kode_gejala' => 'G7', 'mb' => 0.6, 'md' => 0.2],
        ['kode_kerusakan' => 'K10', 'kode_gejala' => 'G8', 'mb' => 0.8, 'md' => 0.2],
        


    ]);
}

}
