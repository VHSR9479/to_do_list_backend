<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{    
    protected $table = 'actividades';
    public $timestamps = true;
    protected $fillable = [
        'id','id_horario', 'id_user', 'descripcion','id_estado'
    ];

    public function horarios(){
        return  $this->belongsTo('App\Models\Horario');
    } 

    public function usuario(){
        return  $this->belongsTo('App\Models\User');
    }
    
    public function estado(){
        return  $this->belongsTo('App\Models\Estado');
    } 
 
}
