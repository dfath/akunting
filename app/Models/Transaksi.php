<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public const TIPE_KREDIT = 'kredit';
    public const TIPE_DEBIT = 'debit';

    protected $table = 'transaksi';

    protected $fillable = [
        'perusahaan_id',
        'akun_id',
        'tipe',
        'waktu_bayar',
        'jumlah',
        'deskripsi',
        'rekonsiliasi',
    ];
}
