<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    protected $primaryKey = 'id';

    protected $fillable = [
        'karyawan_id',
        'mulai_cuti',
        'selesai_cuti',
        'total_cuti',
        'status'
    ];

    // Satu Cuti belongs to Satu Karyawan
    public function karyawan(){
        return $this->belongsTo(karyawan::class);
    }
}
