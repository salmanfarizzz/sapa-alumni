<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    protected $table = 'kategori'; // Sesuaikan dengan nama tabel yang benar
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];

    public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps
}