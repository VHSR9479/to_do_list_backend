<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use DB;
class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividades = Actividad::create($request->all());
        return $actividades;
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idUser)
    {
        $actividades = actividad::join('horarios','horarios.id','=','actividades.id_horario')
        ->join('users','users.id','=','actividades.id_user')
        ->join('estados','estados.id','=','actividades.id_estado')        
        ->where('actividades.id_user','=', $idUser)
        ->select(   'actividades.id',                  
                    'actividades.descripcion',                  
                    'actividades.created_at',
                    'actividades.updated_at',                  
                    'actividades.id_estado',
                    'estados.descripcion as descEstado',
                    'actividades.id_user',
                    'users.name',
                    'actividades.id_horario', 
                    'horarios.hora_inicial',
                    'horarios.hora_final'
        )
        ->get();
        // ->toSql();
        return $actividades;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $actividades = Actividad::find($request->id);
        $actividades->id_estado = 2;
        $result =$actividades->save(); 
        if($result){
            return ["resultados"=>"Los datos se modifiaron","estado"=>"202"];
        }else{
            return ["resultados"=>"Los datos no se modifiaron","estado"=>"500"];
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = actividad::findOrFail($id);
        if($actividad)
            $actividad->delete(); 
        else
            return response()->json(error);
            return response()->json(null,202);  
    }
}
