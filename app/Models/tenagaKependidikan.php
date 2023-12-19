<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenagaKependidikan extends Model
{
    use HasFactory;
    protected $table = "tenaga_kependidikan";
    protected $fillable = ['nama', 'bidang', 'id_lab', 'foto'];
}
