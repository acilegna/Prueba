@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('includes.message')
        <h3 id="title-prod" class="title-Alumno">Actualización de Alumnos</h3>
        <form action="{{ route('saveChang') }}" method="POST" id="altaAlumnos">
            {{ csrf_field() }}
            @foreach ($consulta as $alumno)
                <input type="hidden" id="inputId" name="inputId" value={{ $alumno->id }}>
                <input type="hidden" id="control" name="control" value={{ $alumno->num_control }}>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputControl">No Control</label>
                        <input type="text" class="form-control" id="inputControl" required name="inputControl"
                            value="{{ $alumno->num_control }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNombre">Nombre Alumno</label>
                        <input type="text" class="form-control" id="inputNombre" required name="inputNombre"
                            value="{{ $alumno->nombre }}">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPaterno">Apellido paterno</label>
                        <input type="text" class="form-control" id="inputPaterno" required name="inputPaterno"
                            value="{{ $alumno->apePat }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" id="inputMaterno" required name="inputMaterno"
                            value="{{ $alumno->apeMat }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTelefono">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" required name="inputTelefono"
                            value="{{ $alumno->telefono }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEdad">Edad</label>
                        <input type="text" class="form-control" id="inputEdad" name="inputEdad"
                            value="{{ $alumno->edad }}" required pattern="[0-9]+">

                    </div>

                </div>
            @endforeach
            <button id="back" type="button" class="btn btn-outline-info "><a href="{{ route('students') }}">
                    Atras</a></button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>


    </div>
@endsection
