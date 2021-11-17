@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h3 id="title-prod" class="title-Alumno">Módulo Alumnos Cursos</h3>
        @include('includes.message')
        <div class="contenido ">

            <div class="col-lg-2">
                <input type="text" name="searchAC" id="searchAC" class="derecha" placeholder="Busqueda.. " />
            </div>
            <div class="col-lg-4">
                <div class="btn-group btn-nuevo"><a href="{{ route('viewAsing') }} " class=" btn btn-primary"><i
                            class="fa fa-cube"></i> Asignar
                        Materias</a> </div>
            </div>
        </div>

        <div class="table-responsive-lg ">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NoControl</th>
                        <th>Nombre Alumno</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Maestro asignado</th>
                        <th>Materia asignada</th>
                        <th id="mitable">Acciones</th>
                    </tr>
                </thead>
                <tbody id="Historial">

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan=" 6">
                            <h5 class="izquierda">Registros encontrados: <span id="total_asignaciones"></span></h5>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
