<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public const KAS_BANK = 1;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
    ];
}
