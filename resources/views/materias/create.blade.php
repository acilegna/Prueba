@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('includes.message')

        <h3 id="title-prod" class="title-Alumno">Registro de materias</h3>
        <form action="{{ route('saveSubjects') }}" method="POST" id="Altamaterias">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputMateria">Materia</label>
                <input type="text" class="form-control" id="inputMateria" name="inputMateria" required>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>


    </div>
@endsection
