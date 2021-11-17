@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('includes.message')

        <h3 id="title-prod" class="title-Alumno">Actualización de Materias</h3>
        <form action="{{ route('saveChangSubjet') }}" method="POST" id="Altamaterias">
            {{ csrf_field() }}

            @foreach ($consulta as $materia)
                <div class="form-group">
                    <label for="inputMateria">Materia</label>
                    <input type="text" class="form-control" id="inputMateria" required name="inputMateria"
                        value={{ $materia->materia }}>
                    <input type="hidden" id="inputId" name="inputId" value={{ $materia->id }}>
                </div>


                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        @endforeach
    </div>
@endsection
