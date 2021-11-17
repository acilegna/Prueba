<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    protected $primaryKey = 'id';
    public $timestamps = true;



    public function capacitacion()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id');
    }

    public static function searchBySubjects($query)
    {
        return self::where('materia', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function duplicateSubjects($materia)
    {
        return self::where('materia', $materia)->first();
    }
}
