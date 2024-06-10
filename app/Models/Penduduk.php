<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'golongan_darah',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'nomor_kk',
        'status',
        'id_rt',
        'foto',
        'pendapatan',
        'status_sosial',
        'status_rumah',
        'status_kesehatan',
        'tempat_lahir',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'nomor_kk', 'nomor_kk');
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class, 'id_rt', 'id_rt');
    }
    

}
