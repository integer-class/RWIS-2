<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';
    protected $primaryKey = 'nik';



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
        'id_rt',
        'foto',
    ];

    public function KartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class, 'id_rt', 'id_rt');
    }
}
