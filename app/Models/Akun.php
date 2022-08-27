<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';

    protected $fillable = [
        'induk_id',
        'nama',
        'kategori_id',
        'perusahaan_id',
        'saldo_awal',
    ];
}
