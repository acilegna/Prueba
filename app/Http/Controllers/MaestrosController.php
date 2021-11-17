<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;

class MaestrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewTeacher()
    {
        return view('maestros.maestros');
    }
    public function filterTeacher(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {

                $data = Maestro::searchByTeacher($query);
            } else {

                $data = Maestro::all();
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
        return view('maestros.create');
    }

    public static function save(Request $request)
    {
        $maestro = new Maestro();
        $maestro->nombre =  $request->inputNombre;
        $maestro->apePat =  $request->inputPaterno;
        $maestro->apeMat =  $request->inputMaterno;
        $maestro->telefono =  $request->inputTelefono;
        $maestro->edad =  $request->inputEdad;
        $maestro->save();
        return redirect()->route('allTeacher')
            ->with(['message' => 'El Registro se ha guardado correctamente.']);
    }

    public function  edit($id)
    {

        $consulta = Maestro::where('id', $id)->get();

        return view('maestros.edit', ['consulta' => $consulta]);
    }
    public function saveChanges(Request $request)
    {
        $id = $request->inputId;


        if ($id) {
            $Maestro = Maestro::find($id);
            $Maestro->nombre =  $request->inputNombre;
            $Maestro->apePat =  $request->inputPaterno;
            $Maestro->apeMat =  $request->inputMaterno;
            $Maestro->telefono =  $request->inputTelefono;
            $Maestro->edad =  $request->inputEdad;
            $Maestro->save();
            return redirect()->route('allTeacher')
                ->with(['message' => 'El Registro se ha guardado correctamente.']);
        } else {
            return redirect()->route('allTeacher')
                ->with(['message_danger' => 'Error! No se recibieron los datos']);
        }
    }
    public function destroy($id)
    {
        $maestro = Maestro::find($id);
        $maestro->delete();

        return redirect()->route('allTeacher')
            ->with(['message' => 'El Registro se eliminado con exito.']);
    }
}
