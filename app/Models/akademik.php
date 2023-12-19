<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class akademik extends Model
{
    use HasFactory;
    protected $table = "akademik";
    protected $fillable = ['judul', 'isi', 'tipe', 'detail_tipe', 'tgl_mulai', 'tgl_akhir', 'foto', 'link'];

    protected $appends = ['tgl_mulai_indo', 'tgl_akhir_indo'];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }

    public function getTglAkhirIndoAttribute()
    {
        if($this->attributes['tgl_akhir']){
            return Carbon::parse($this->attributes['tgl_akhir'])->translatedFormat('d F Y');
        }
        else
        {
            return 'present';
        }
    }
}