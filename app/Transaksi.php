<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['nama_rekening', 'nomor_rekening', 'bank', 'alamat', 'total'];
}
