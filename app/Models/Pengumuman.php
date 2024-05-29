<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'id_pengumuman',
        'judul',
        'isi_pengumuman',
        'foto',
        'tanggal_pengumuman',
        'kepentingan'
    ];

    public function rt()
    {
        return $this->belongsToMany(Rt::class, 'pengumuman_rt', 'id_pengumuman', 'id_rt');
    }
}
