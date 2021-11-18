<?php

namespace App\Models;

use DeepCopy\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected $table = 'capacitacion';


    // Relación de Muchos a Uno
    public function materia()
    {
        return $this->belongsTo('App\Models\Materia', 'id_materia');
    }
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno', 'id_alumno');
    }
    public function maestro()
    {
        return $this->belongsTo('App\Models\Maestro', 'id_maestro');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
    public static  function capacitacion()
    {
        //consulta eloquent
        return self::with('materia:id,materia,id', 'alumno:id,num_control,nombre_alumno,apePat,telefono', 'maestro:id,nombre')->get();
        /*   consulta query builder 
        return self::join('materias', 'materias.id', '=', 'capacitacion.id_materia')
            ->join('alumnos', 'alumnos.id', '=', 'capacitacion.id_alumno')
            ->join('maestros', 'maestros.id', '=', 'capacitacion.id_maestro')
            ->select('capacitacion.id as id_capacitacion', 'materias.id as id_materia', 'materias.materia', 'alumnos.id as id_alumno', 'alumnos.num_control', 'alumnos.nombre as nombre_alumno', 'alumnos.apePat', 'alumnos.telefono', 'maestros.nombre', 'maestros.id as id_maestros')
            ->get();*/
    }

    public static  function searchCapacitacion($param)

    {
        /* filtro con query builder
        return self::join('materias', 'materias.id', '=', 'capacitacion.id_materia')
            ->join('alumnos', 'alumnos.id', '=', 'capacitacion.id_alumno')
            ->join('maestros', 'maestros.id', '=', 'capacitacion.id_maestro')
            ->select('capacitacion.id as id_capacitacion', 'materias.id as id_materia', 'materias.materia', 'alumnos.id as id_alumno', 'alumnos.num_control', 'alumnos.nombre as nombre_alumno', 'alumnos.apePat', 'alumnos.telefono', 'maestros.nombre', 'maestros.id as id_maestros')
            ->where('materias.materia', 'like', '%' . $param . '%')
            ->orWhere('alumnos.apePat', 'like', '%' . $param . '%')
            ->orWhere('alumnos.num_control', 'like', '%' . $param . '%')
            ->get();
            
        
            */
        //filtro eloquent
        return self::with('materia:id,materia,id', 'alumno:id,num_control,nombre_alumno,apePat,telefono', 'maestro:id,nombre')
            ->whereHas('materia', function ($q) use ($param) {
                $q->where('materia', 'like', '%' . $param . '%');
            })
            ->orwhereHas('alumno', function ($q) use ($param) {
                $q->where('nombre_alumno', 'like', '%' . $param . '%');
            })
            ->orwhereHas('maestro', function ($q) use ($param) {
                $q->where('nombre', 'like', '%' . $param . '%');
            })
            ->get();
    }



    public static  function findCapacitacion($id)
    {
        return self::with(
            'materia:id,materia,id',
            'alumno:id,num_control,nombre_alumno,apePat,telefono',
            'maestro:id,nombre'
        )->where('id', $id)->get();
    }
    public static function findMateria($inputId_Alumno)
    {
        return self::select(['id_materia'])
            ->where('id_alumno', $inputId_Alumno)
            ->get();
    }
}
