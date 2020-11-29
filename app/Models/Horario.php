<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    public $timestamps = true;
    protected $fillable = [
        'id','hora_inicial','hora_final'
    ];
    use HasFactory;
}
