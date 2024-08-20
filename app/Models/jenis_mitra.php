<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_mitra extends Model
{
    // use HasFactory;
    protected $table = 'jenis_mitra';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];
      public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps
}
