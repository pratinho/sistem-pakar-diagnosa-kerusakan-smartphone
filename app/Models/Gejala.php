<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejalas';

    // Izinkan kolom 'nama_gejala' dan 'kode_gejala' diisi melalui mass assignment
    protected $fillable = ['nama_gejala', 'kode_gejala'];

    // Relasi ke CertaintyFactor berdasarkan 'kode_gejala'
    public function certaintyFactors()
    {
        return $this->hasMany(CertaintyFactor::class, 'kode_gejala', 'kode_gejala');
    }
}
