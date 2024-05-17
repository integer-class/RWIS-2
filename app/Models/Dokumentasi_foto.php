<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi_foto extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_foto';
    

    protected $fillable = [
        'id_dokumentasi',
        'name',
        'filesize',
        'path'
    ];
}
