<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';


    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'golong_darah',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'nomor_kk',
    ];

    public function KartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
