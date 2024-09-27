<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertaintyFactor extends Model
{
    use HasFactory;

    protected $table = 'certainty_factors';

    // Izinkan kolom-kolom ini diisi melalui mass assignment
    protected $fillable = ['kode_kerusakan', 'kode_gejala', 'mb', 'md'];

    // Relasi ke Kerusakan berdasarkan 'kode_kerusakan'
    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_kerusakan', 'kode_kerusakan');
    }

    // Relasi ke Gejala berdasarkan 'kode_gejala'
    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }
}
