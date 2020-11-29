<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    public $timestamps = true;
    protected $fillable = [
        'id','id_actividad','descripcion'
    ];
    use HasFactory;

}
