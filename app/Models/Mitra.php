<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    // use HasFactory;

    protected $table = 'mitra';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'slug',
        'jenis',
        'gambar'
    ];
      public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps
}
