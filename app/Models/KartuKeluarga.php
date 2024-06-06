<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'nomor_kk';



    protected $fillable = [
        'nomor_kk',
        'alamat',
        'kepalakeluarga',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kewarganegaraan',
    ];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'nomor_kk', 'nomor_kk');
    }

}
