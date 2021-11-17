@extends('layouts.app')

@section('content')
    <div class="container ">
        @include('includes.message')

        <h3 id="title-prod" class="title-Alumno">Actualización de datos</h3>
        <form action=" {{ route('saveChangAsingSub') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idAlumno">Alumnos</label>
                    </div>

                    <select class="custom-select" id="idAlumno" name="idAlumno">

                        @foreach ($consulta as $valor)

                            <option value="{{ $valor->alumno->id }}">{{ $valor->alumno->nombre }}
                            </option>

                            <input name="inputId" type="hidden" value="{{ $valor->id }}">
                    </select>

                </div>

                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idMaestro">Maestros</label>
                    </div>
                    <select class="custom-select" id="idMaestro" name="idMaestro">

                        @foreach ($maestro as $registro)
                            <option value="{{ $registro->id }}" @if ($valor->id_maestro == $registro->id) selected @endif>{{ $registro->nombre }}
                            </option>

                        @endforeach
                    </select>
                </div>
                <div class="input-group col-md-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="idMateria">Materias</label>
                    </div>
                    <select class="custom-select" id="idMateria" name="idMateria">
                        @foreach ($materia as $registro)
                            <option value="{{ $registro->id }}" @if ($valor->id_materia == $registro->id) selected @endif>{{ $registro->materia }}
                            </option>
                        @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="back" type="button" class="btn btn-outline-info "><a href="{{ route('viewAll') }}">
                    Atras</a></button>

            <button class="btn btn-primary" type="submit" name="agregar">
                Guardar Cambios</button>


        </form>

    </div>
@endsection
