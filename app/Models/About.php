<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // use HasFactory;

    protected $table = 'about';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'tanggal',
        'deskripsi'
    ];
      public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps
}
