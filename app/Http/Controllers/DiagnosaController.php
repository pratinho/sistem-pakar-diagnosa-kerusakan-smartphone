<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertaintyFactor;
use App\Models\Kerusakan;
use App\Models\Gejala;

class DiagnosaController extends Controller
{
    /**
     * Menampilkan form untuk memilih gejala dan keyakinan.
     */
    public function showDiagnosaForm()
    {
        // Ambil semua gejala dari database
        $gejalas = Gejala::all(); 

        // Kirim gejala ke view diagnosa
        return view('diagnosa', compact('gejalas'));
    }

    /**
     * Memproses input diagnosa dari user
     */
//     public function prosesDiagnosa(Request $request)
// {
//     // Ambil input dari form
//     $cf_users = $request->input('cf_user');   // Ambil nilai keyakinan user untuk setiap gejala

//     // Filter gejala yang dipilih dengan nilai CF > 0 (gejala yang relevan saja)
//     $gejala_ids = array_filter($cf_users, function ($value) {
//         return floatval($value) > 0; // Hanya ambil gejala dengan nilai CF user > 0
//     });

//     // Jika tidak ada gejala yang dipilih (semua 0), redirect kembali dengan error
//     if (empty($gejala_ids)) {
//         return redirect('/diagnosa')->with('error', 'Anda belum memilih gejala yang cukup yakin.');
//     }

//     // Ambil data certainty factors yang hanya terkait dengan gejala yang dipilih
//     // $certainty_factors = CertaintyFactor::with(['kerusakan', 'gejala'])
//     //                                     ->whereIn('kode_gejala', array_keys($gejala_ids))
//     //                                     ->get();

//     // dd($certainty_factors);
//     $certainty_factors = CertaintyFactor::select('*')
//                         ->whereIn('kode_gejala', array_keys($gejala_ids))
//                         ->get();
//     // foreach($certainty_factors as $cfs) {
//     //     $cf_pakar = $cfs->mb - $cfs->md;

//     //     // $cf_paralel = $cf_user * $cf_pakar;

//     //     $data = [];
//     //     foreach($gejala_ids as $usr) {
//     //         $data[] = $usr * $cf_pakar;
//     //     }
        
//     //     // dd($data);
//     //     dd((1 - $data[0]) * $data[1] + $data[0]);
//     // }
//     foreach ($certainty_factors as $cfs) {
//         $cf_pakar = $cfs->mb - $cfs->md;
    
//         // $cf_paralel = $cf_user * $cf_pakar;
    
//         $data = [];
//         // Loop untuk menghitung CF gabungan berdasarkan CF user dan CF pakar
//         foreach ($gejala_ids as $usr) {
//             $data[] = $usr * $cf_pakar;  // Kalikan CF user dengan CF pakar
//         }
    
//         // Mulai hitung penggabungan CF secara paralel
//         if (count($data) > 1) {
//             $cf_gabungan = $data[0]; // Mulai dari CF pertama
//             for ($i = 1; $i < count($data); $i++) {
//                 $cf_gabungan = $cf_gabungan + ($data[$i] * (1 - abs($cf_gabungan))); // Gabungkan dengan CF berikutnya
//             }
//             dd($cf_gabungan);  // Hasil CF gabungan dinamis
//         } else {
//             // Jika hanya satu gejala, langsung gunakan nilai CF tersebut
//             dd($data[0]);
//         }
//     }
    

//     $hasil_diagnosa = [];

//     //punyo bg ilham
//     // foreach ($certainty_factors as $cf) {
//     //     $kerusakan = $cf->kerusakan;
//     //     $gejala = $cf->gejala;
    
//     //     // Ambil nilai CF user untuk gejala yang relevan
//     //     $cf_user = floatval($cf_users[$gejala->kode_gejala]);
    
//     //     // Hitung CF pakar (MB - MD)
//     //     $cf_pakar = $cf->mb - $cf->md;
    
//     //     // Hitung CF gabungan (CF user * CF pakar)
//     //     $cf_value = $cf_user * $cf_pakar;
    
//     //     // Gabungkan CF jika ada lebih dari satu gejala yang terkait dengan kerusakan yang sama
//     //     if (isset($hasil_diagnosa[$kerusakan->kode_kerusakan])) {
//     //         $cf_gabungan = $hasil_diagnosa[$kerusakan->kode_kerusakan]['certainty_factor'];
//     //         $cf_gabungan = $cf_value + ($cf_gabungan * (1 - abs($cf_value)));
//     //         $hasil_diagnosa[$kerusakan->kode_kerusakan]['certainty_factor'] = $cf_gabungan * 100;
//     //         $hasil_diagnosa[$kerusakan->kode_kerusakan]['keterangan'] = "Berdasarkan Diagnosa Menggunakan Sistem Pakar, Kerusakan yang ditemukan adalah: " . $kerusakan->nama_kerusakan . " (" . ($cf_gabungan * 100) . "%)";
//     //     } else {
//     //         $hasil_diagnosa[$kerusakan->kode_kerusakan] = [
//     //             'kerusakan' => $kerusakan->nama_kerusakan,
//     //             'certainty_factor' => $cf_value * 100,
//     //             'keterangan' => "Berdasarkan Diagnosa Menggunakan Sistem Pakar, Kerusakan yang ditemukan adalah: " . $kerusakan->nama_kerusakan . " (" . ($cf_value * 100) . "%)"
//     //         ];
//     //     }
//     // }
    

//     // Urutkan hasil diagnosa berdasarkan certainty factor tertinggi
//     usort($hasil_diagnosa, function ($a, $b) {
//         return $b['certainty_factor'] <=> $a['certainty_factor'];
//     });

//     // Tampilkan hasil diagnosa ke view hasil_diagnosa
//     return view('hasil_diagnosa', ['diagnosa' => $hasil_diagnosa]);
// }
public function prosesDiagnosa(Request $request)
{
    // Ambil input dari form (nilai CF user)
    $cf_users = $request->input('cf_user');   // Ambil nilai keyakinan user untuk setiap gejala

    // Filter gejala yang dipilih dengan nilai CF > 0
    $gejala_ids = array_filter($cf_users, function ($value) {
        return floatval($value) > 0;
    });

    // Jika tidak ada gejala yang dipilih (semua 0), redirect kembali dengan error
    if (empty($gejala_ids)) {
        return redirect('/diagnosa')->with('error', 'Anda belum memilih gejala yang cukup yakin.');
    }

    // Ambil data certainty factors yang hanya terkait dengan gejala yang dipilih
    $certainty_factors = CertaintyFactor::with(['kerusakan', 'gejala'])
                                            ->whereIn('kode_gejala', array_keys($gejala_ids))
                                            ->get();

    // dd($certainty_factors, $gejala_ids);
    $dataMapp = [];
    foreach($certainty_factors as $crt) {
        $dataMapp[] = $crt->mb;
    }
    dd($crt);

    $hasil_diagnosa = [];

    $dataPakar = [];
    foreach ($certainty_factors as $cf) {
        $dataPakar[] = $cf->mb - $cf->md;
        $cf_pakar = $cf->mb - $cf->md;  // Hitung CF pakar (MB - MD)
    }
    
    
    $data = [];
    foreach($dataPakar as $dpk) {
        foreach ($cf_users as $gejala => $cf_user) {
            $data[] = $cf_user * $dpk; // Hitung CF user * CF pakar
        }

        // Hitung CF gabungan menggunakan fungsi yang telah dibuat
        $cf_gabungan = $this->hitungCfGabungan($data);

        // Simpan hasil diagnosa
        $hasil_diagnosa[$cf->kerusakan->kode_kerusakan] = [
            'kerusakan' => $cf->kerusakan->nama_kerusakan,
            'certainty_factor' => $cf_gabungan * 100, // Dalam bentuk persentase
            'keterangan' => "Berdasarkan diagnosa, kerusakan yang ditemukan adalah: " . $cf->kerusakan->nama_kerusakan . " dengan tingkat kepastian " . ($cf_gabungan * 100) . "%"
        ];
    }
    dd($data);

    // Urutkan hasil diagnosa berdasarkan CF tertinggi
    usort($hasil_diagnosa, function ($a, $b) {
        return $b['certainty_factor'] <=> $a['certainty_factor'];
    });

    // Tampilkan hasil diagnosa ke view hasil_diagnosa
    return view('hasil_diagnosa', ['diagnosa' => $hasil_diagnosa]);
}

/**
 * Fungsi untuk menghitung CF gabungan jika lebih dari dua gejala
 */
    function hitungCfGabungan($cf_values)
    {
        // Jika hanya ada satu CF, langsung return CF tersebut
        if (count($cf_values) === 1) {
            return $cf_values[0];
        }

        // Mulai dengan CF pertama
        $cf_gabungan = $cf_values[0];

        // Lanjutkan menggabungkan CF satu per satu menggunakan rumus CFK
        // for ($i = 1; $i < count($cf_values); $i++) {
        //     $cf_gabungan = $cf_gabungan + ($cf_values[$i] * (1 - abs($cf_gabungan)));
        // }

        // rumus CFK1(CF1,CF2)=CF1+CF2×(1-CF1)
        $cfk1 = $cf_gabungan + ($cf_values[1] * (1 - abs($cf_gabungan)));

        // rumus CFK2(CFK1,CF3)=CFK1+CF3×(1-CFK1)
        $cfk2 = $cfk1 + ($cf_values[2] * (1 - abs($cfk1)));
        // dd($cfk2);

        // 792 + 
        // Kembalikan hasil akhir dari CF gabungan
        // return $cf_gabungan;
    }



}
