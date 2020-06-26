<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    protected $table = 'Masakan';
    protected $fillable = ['gambar', 'nama', 'deskripsi', 'harga'];
}
