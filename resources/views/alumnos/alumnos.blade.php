@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="title-Alumno">Módulo de Alumnos</h3>
        @include('includes.message')
        <div class="contenido">
            <div class="col-lg-2">
                <input type="text" name="searchStudent" id="searchStudent" class="derecha"
                    placeholder="Busqueda.. " />
            </div>
            <div class="col-lg-4">
                <div class="btn-group btn-nuevo"><a href="{{ route('createStudents') }}" class=" btn btn-primary"><i
                            class="fa fa-cube"></i> Nuevo Alumno
                    </a> </div>
            </div>
        </div>


        <div class="table-responsive-lg ">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NoControl</th>
                        <th>Nombre</th>
                        <th>Apellido_P</th>
                        <th>Apellido_M</th>
                        <th>Telefono</th>


                        <th id="mitable">Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyStudents" </tbody>
                <tfoot>
                    <tr>
                        <th colspan=" 6">
                            <h5 class="izquierda">Registros encontrados: <span id="total_students"></span></h5>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
