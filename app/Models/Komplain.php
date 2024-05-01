<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;
    protected $table = 'komplain';

    //fillable
    protected $fillable = [
        'nik',
        'isi_komplain',
        'status_komplain',
    ];

    //relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    //relasi user dengan penduduk
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }

    


}
