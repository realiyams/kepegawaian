<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'alamat',
    ];

    public function cuti(){
        return $this->hasMany(cuti::class);
    }

    public function lembur(){
        return $this->hasMany(lembur::class);
    }

    public function penggajian(){
        return $this->hasMany(penggajian::class);
    }
}
