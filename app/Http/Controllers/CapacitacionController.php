<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Capacitacion;
use App\Models\Materia;
use App\Models\Maestro;


use Illuminate\Http\Request;

class CapacitacionController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function  viewAsingSub()
    {
        $maestro = Maestro::all('nombre', 'id');
        $alumno = Alumno::all('nombre', 'id');
        $materia = Materia::all('materia', 'id');

        return view('capacitacion.create', [
            'maestro' => $maestro,
            'alumno' => $alumno, 'materia' => $materia
        ]);
    }
    public function saveAsing(Request $request)
    {
        $inputMateria = $request->get("idMateria");
        $inputId_Alumno = $request->get("idAlumno");
        $resultValidate = $this->validateMatter($inputId_Alumno, $inputMateria);
        if ($resultValidate == 0) {
            $user = \Auth::user();
            $alumnoCurso = new Capacitacion();
            $alumnoCurso->id_materia = $inputMateria;
            $alumnoCurso->id_alumno =  $inputId_Alumno;
            $alumnoCurso->id_maestro = $request->get("idMaestro");
            $alumnoCurso->id_user = $user->id;
            $alumnoCurso->save();
            return  redirect()->route('viewAll')
                ->with(['message' => 'El Registro se guardado correctamente.']);
        } else {
            return  redirect()->route('viewAll')
                ->with(['message_danger' => 'El alumno ya tiene asignada esa materia.']);
        }
    }


    public function validateMatter($inputId_Alumno, $inputMateria)
    {
        $resultValidate = 0;
        $resFindMateria = Capacitacion::findMateria($inputId_Alumno);
        foreach ($resFindMateria as $materia) {
            if ($materia->id_materia == $inputMateria) {
                $resultValidate++;
            }
        }
        return $resultValidate;
    }



    public function viewAlumnosCursos(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $inputsearchAC = $request->get('query');
            if ($inputsearchAC != '') {

                $data = Capacitacion::searchCapacitacion($inputsearchAC);
            } else {

                $data = Capacitacion::capacitacion();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                $output = $data;
            } else {
                $output = ["No hay registros"];
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
    public function viewAllAssignation()
    {
        return view('capacitacion.alumnosCursos');
    }

    public function destroy($id)
    {
        $capacitacion = Capacitacion::find($id);
        $capacitacion->delete();
        return redirect()->route('viewAll')
            ->with(['message' => 'Se ha desasignado correctamente.']);
    }

    public function edit($id)
    {
        $maestro = Maestro::all('nombre', 'id');
        $alumno = Alumno::all('nombre', 'id');
        $materia = Materia::all('materia', 'id');
        $consulta = Capacitacion::findCapacitacion($id);
        return view('capacitacion.edit', [
            'consulta' => $consulta, 'maestro' => $maestro,
            'alumno' => $alumno, 'materia' => $materia
        ]);
    }

    public function saveChanges(Request $request)
    {
        $idAlumnoCurso = $request->inputId;
        $inputId_Alumno = $request->get("idAlumno");
        $inputMateria = $request->get("idMateria");
        $user = \Auth::user();
        $resultValidate = $this->validateMatter($inputId_Alumno, $inputMateria);
        if ($resultValidate == 0) {
            $alumnoCurso = Capacitacion::find($idAlumnoCurso);
            $alumnoCurso->id_materia = $inputMateria;
            $alumnoCurso->id_alumno = $inputId_Alumno;
            $alumnoCurso->id_maestro = $request->get("idMaestro");
            $alumnoCurso->id_user = $user->id;
            $alumnoCurso->save();
            return redirect()->route('viewAll')
                ->with(['message' => 'Datos modificados.']);
        } else {
            return  redirect()->route('viewAll')
                ->with(['message_danger' => 'El alumno ya tiene asignada esa materia.']);
        }
    }
}
