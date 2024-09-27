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

    public function prosesDiagnosa(Request $request)
    {
        $cf_users = $request->input('cf_user');
        $gejala_ids = array_filter($cf_users, function ($value) {
            return floatval($value) > 0;
        });

        if (empty($gejala_ids)) {
            return redirect('/diagnosa')->with('error', 'Anda belum memilih gejala yang cukup yakin.');
        }

        $certainty_factors = CertaintyFactor::with(['kerusakan', 'gejala'])
                            ->whereIn('kode_gejala', array_keys($gejala_ids))
                            ->get();

        $hasil_diagnosa = [];
        $hasil_cf_per_kerusakan = [];

        foreach ($certainty_factors as $item) {
            if (isset($gejala_ids[$item['kode_gejala']])) {
                $nilai_mb = $item['mb'];
                $nilai_md = $item['md'];
                $nilai_pakar = $nilai_mb - $nilai_md;
                $nilai_user = $gejala_ids[$item['kode_gejala']];

                $nilai_cf = $nilai_pakar * $nilai_user;

                $hasil_cf_per_kerusakan[$item->kerusakan->kode_kerusakan][] = $nilai_cf;
            }
        }

        foreach ($hasil_cf_per_kerusakan as $kode_kerusakan => $cf_values) {
            $cf_gabungan = $this->hitungCfGabungan($cf_values);

            $kerusakan = CertaintyFactor::where('kode_kerusakan', $kode_kerusakan)->first()->kerusakan;
            $hasil_diagnosa[] = [
                'kerusakan' => $kerusakan->nama_kerusakan,
                'certainty_factor' => $cf_gabungan * 100,
                'keterangan' => "Berdasarkan diagnosa, kerusakan yang ditemukan adalah: " . $kerusakan->nama_kerusakan . " dengan tingkat kepastian " . ($cf_gabungan * 100) . "%"
            ];
        }

        usort($hasil_diagnosa, function ($a, $b) {
            return $b['certainty_factor'] <=> $a['certainty_factor'];
        });

        return view('hasil_diagnosa', ['diagnosa' => $hasil_diagnosa]);
    }

    function hitungCfGabungan($cf_values)
    {
        if (count($cf_values) === 1) {
            return $cf_values[0];
        }

        $cf_gabungan = $cf_values[0];

        for ($i = 1; $i < count($cf_values); $i++) {
            $cf_gabungan = $cf_gabungan + ($cf_values[$i] * (1 - abs($cf_gabungan)));
        }

        return $cf_gabungan;
    }



}
