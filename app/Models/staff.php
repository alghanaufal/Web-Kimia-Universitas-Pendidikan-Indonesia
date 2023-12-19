<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $table = "staff";
    protected $fillable = ['id_posisi', 'id_lab', 'id_dosen'];


    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi', 'id');
    }

    public function lab()
    {
        return $this->belongsTo(Fasilitas::class, 'id_lab', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

}
