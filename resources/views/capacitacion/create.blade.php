@extends('layouts.app')

@section('content')
    <div class="container ">
        @include('includes.message')

        <h3 id="title-prod" class="title-Alumno">Asignacion de Materias y Docentes</h3>
        <form action=" {{ route('saveAsingsub') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idAlumno">Alumnos</label>
                    </div>

                    <select class="custom-select" id="idAlumno" name="idAlumno">
                        <option selected>Choose...</option>
                        @foreach ($alumno as $registroAlumno)
                            <option value="{{ $registroAlumno->id }}">{{ $registroAlumno->nombre }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idMaestro">Maestros</label>
                    </div>
                    <select class="custom-select" id="idMaestro" name="idMaestro">
                        <option selected>Choose...</option>
                        @foreach ($maestro as $registros)
                            <option value="{{ $registros->id }}">{{ $registros->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idMateria">Materias</label>
                    </div>
                    <select class="custom-select" id="idMateria" name="idMateria">
                        <option selected>Choose...</option>
                        @foreach ($materia as $registro)
                            <option value="{{ $registro->id }}">{{ $registro->materia }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button id="back" type="button" class="btn btn-outline-info "><a href="{{ route('viewAll') }}">
                    Atras</a></button>

            <button class="btn btn-primary" type="submit" name="agregar">
                Asignar </button>

        </form>

    </div>
@endsection
