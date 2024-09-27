<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;

    protected $table = 'kerusakans';

    // Izinkan kolom 'nama_kerusakan' dan 'kode_kerusakan' diisi melalui mass assignment
    protected $fillable = ['nama_kerusakan', 'kode_kerusakan'];

    // Relasi ke CertaintyFactor berdasarkan 'kode_kerusakan'
    public function certaintyFactors()
    {
        return $this->hasMany(CertaintyFactor::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
