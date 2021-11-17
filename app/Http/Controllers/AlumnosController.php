<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Maestro;

class AlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewStudents()
    {
        return view('alumnos.alumnos');
    }
    public function allStudents(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {

                $data = Alumno::searchByStudents($query);
            } else {

                $data = Alumno::all();
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

    public static function create()
    {
        return view('alumnos.create');
    }
    public static function save(Request $request)
    {

        $NControl = $request->inputControl;
        $num_control = Alumno::controlNumberDuplicate($NControl);

        if ($num_control) {
            return redirect()->route('students')
                ->with(['message_danger' => 'Ese numero de control ya existe en la BD.']);
        } else {

            $alumnos = new Alumno();
            $alumnos->num_control =  $NControl;
            $alumnos->nombre =  $request->inputNombre;
            $alumnos->apePat =  $request->inputPaterno;
            $alumnos->apeMat =  $request->inputMaterno;
            $alumnos->telefono =  $request->inputTelefono;
            $alumnos->edad =  $request->inputEdad;
            $alumnos->save();
            return redirect()->route('students')
                ->with(['message' => 'El Registro se ha guardado correctamente.']);
        }
    }


    public function  edit($id)
    {

        $consulta = Alumno::where('id', $id)->get();

        return view('alumnos.edit', ['consulta' => $consulta]);
    }

    public function saveChanges(Request $request)
    {
        $id = $request->inputId;
        $controlNumber = $request->inputControl;
        $control = $request->control;
        $resultControlNumber = Alumno::controlNumberDuplicate($control);

        if ($resultControlNumber->num_control == $controlNumber) {
            $alumnos = Alumno::find($id);
            $alumnos->nombre =  $request->inputNombre;
            $alumnos->apePat =  $request->inputPaterno;
            $alumnos->apeMat =  $request->inputMaterno;
            $alumnos->telefono =  $request->inputTelefono;
            $alumnos->edad =  $request->inputEdad;
            $alumnos->save();
            return redirect()->route('students')
                ->with(['message' => 'El Registro se ha modificado correctamente.']);
        } else {
            if ($resultControlNumber) {
                return redirect()->route('students')
                    ->with(['message_danger' => 'Ese numero de control ya existe en la BD.']);
            }
        }
    }
    public function destroy($id)
    {
        $alumnos = Alumno::find($id);
        $alumnos->delete();

        return redirect()->route('students')
            ->with(['message' => 'El Registro se ha borrado correctamente.']);
    }
}
