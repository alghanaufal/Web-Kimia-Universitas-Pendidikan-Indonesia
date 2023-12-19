<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programKimia extends Model
{
    use HasFactory;
    protected $table = "program_kimia";
    protected $fillable = ['judul', 'info1', 'info2', 'info3', 'info4', 'info5', 'foto'];
}
