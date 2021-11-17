<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $table = 'maestros';

    // Relación One To Many 
    public function capacitacion()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id');
    }

    public static function searchByTeacher($query)
    {
        return self::where('nombre', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->get();
    }
}
