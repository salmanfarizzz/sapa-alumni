<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['option_id', 'option_text', 'points']);
    }

    public function options()
    {
        return $this->belongsToMany(options::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tahun_akademik()
    {
        return $this->belongsTo(TahunAkademik::class);
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}

