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


}
