<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fasilitas extends Model
{
    use HasFactory;
    protected $table = "fasilitas";
    protected $fillable= ['nama', 'tipe', 'isi', 'foto', 'foto2', 'foto3', 'foto4', 'foto5', 'link'];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'id_lab', 'id');
    }
}
