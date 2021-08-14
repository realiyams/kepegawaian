<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lembur extends Model
{
    use HasFactory;

    protected $table = 'lembur';
    protected $primaryKey = 'id';

    protected $fillable = [
        'karyawan_id',
        'mulai_lembur',
        'selesai_lembur',
        'total_jam',
        'total'
    ];

    // Satu Lembur belongs to Satu Karyawan
    public function karyawan(){
        return $this->belongsTo(karyawan::class);
    }
}
