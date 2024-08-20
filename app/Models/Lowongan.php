<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
class Lowongan extends Model
{
    // use HasFactory;

    protected $table = 'lowongan';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'tanggal',
        'banner',
        'logo',
        'perusahaan'
    ];
      public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps
}
