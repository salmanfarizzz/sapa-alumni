<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Session;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
	protected $table = 'artikel';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'subjek',
        'thumbnail',
        'kategori',
        'penulis',
        'tanggal',
        'is_publish',
        'is_featured'
    ];

    public function setKategoriAttribute($value)
    {
        $this->attributes['kategori'] = json_encode($value);
    }

    public static function cekPenulis($id){
        $user = Auth::user()->id;
        $penulis = self::where('id', $id)->where('pusatkarir', $user)->first();

        if($penulis==null){
            Session::flash('warning', 'Maaf, anda tidak memiliki hak akses');
            return true;
        }else{
            return false;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // public function kategori()
    // {
    //     return $this->belongsTo(Kategori::class, 'kategori');
    // }

    public $timestamps = false; // Tambahkan baris ini untuk menonaktifkan timestamps

    // public function getKategoriAttribute($value)
    // {
    //     return $this->attributes['kategori'] = json_decode($value);
    // }
}
