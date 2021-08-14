<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajian';
    protected $primaryKey = 'id';

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'jumlah_gaji',
        'jumlah_lembur',
        'jumlah_cuti',
        'total_gaji'
    ];

    // Satu Gajian belongs to Satu Karyawan
    public function karyawan(){
        return $this->belongsTo(karyawan::class);
    }
}
