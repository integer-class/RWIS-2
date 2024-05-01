<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKomplain extends Model
{
    use HasFactory;

    protected $table = 'kategori_komplain';

    protected $primaryKey = 'id_kategori_komplain';

    protected $fillable = [
        'nama_kategori_komplain',
    ];
}
