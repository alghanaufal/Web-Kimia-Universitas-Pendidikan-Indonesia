<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $fillable = ['nama', 'nip', 'email', 'jabatan', 'bidang', 'foto', 'scopus', 'scholar', 'sinta'];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'id_dosen', 'id');
    }
}
