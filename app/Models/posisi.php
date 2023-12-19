<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    use HasFactory;
    protected $table = "posisi";
    protected $fillable = ['tipe', 'nama'];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'id_posisi', 'id');
    }
}


