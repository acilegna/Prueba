<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Materia;

class MateriasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSubjects()
    {
        return view('materias.materias');
    }

    public function allSubjects(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                //hace el filtro
                $data = Materia::searchBySubjects($query);
            } else {
                //muestra todos los datos

                $data = Materia::all();
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
        return view('materias.create');
    }
    public static function save(Request $request)
    {
        $materia = $request->inputMateria;
        $search_materia = Materia::duplicateSubjects($materia);
        if ($search_materia) {
            return redirect()->route('subjects')
                ->with(['message_danger' => 'Esa materia ya existe en la BD']);
        } else {
            $materias = new Materia();
            $materias->materia = $materia;
            $materias->save();
            return redirect()->route('subjects')
                ->with(['message' => 'El Registro se ha guardado correctamente.']);
        }
    }



    public function  edit($id)
    {
        //$consulta = Materia::find($id)->get();
        $consulta = Materia::where('id', $id)->get();
        return view('materias.edit', ['consulta' => $consulta]);
    }

    public function saveChanges(Request $request)
    {
        $id = $request->inputId;
        $materia = $request->inputMateria;
        $search_materia = Materia::duplicateSubjects($materia);

        if ($id) {
            if ($search_materia) {
                return redirect()->route('subjects')
                    ->with(['message_danger' => 'Esa materia ya existe en la BD']);
            } else {
                $materias = Materia::find($id);
                $materias->materia = $request->inputMateria;
                $materias->save();

                return redirect()->route('subjects')
                    ->with(['message' => 'El Registro se ha modificado correctamente.']);
            }
        } else {
            return redirect()->route('subjects')
                ->with(['message_danger' => 'Error! No se recibieron los datos']);
        }
    }

    public function destroy($id)
    {
        $materias = Materia::find($id);
        $materias->delete();

        return redirect()->route('subjects')
            ->with(['message' => 'El Registro se ha borrado correctamente.']);
    }
}
