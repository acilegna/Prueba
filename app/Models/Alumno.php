<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    public function capacitacion()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id');
    }
    public static function searchByStudents($query)
    {
        return self::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('apePat', 'like', '%' . $query . '%')
            ->orWhere('num_control', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->get();
    }
    public static function controlNumberDuplicate($controlNumber)
    {
        return self::where('num_control', $controlNumber)->first();
    }
}
