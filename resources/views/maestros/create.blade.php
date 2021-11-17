@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('includes.message')
        <h3 class="title-Alumno">Registro Maestros</h3>
        <form action="{{ route('saveTeacher') }}" method="POST" id="altaDocentes">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" class="form-control" id="inputNombre" name="inputNombre" required
                        placeholder="Nombre">
                </div>
                <div class="form-group col-md-4">

                    <label for="inputPaterno">Apellido Paterno</label>
                    <input type="text" class="form-control" id="inputPaterno" required name="inputPaterno">
                </div>

                <div class="form-group col-md-4">
                    <label for="inputMaterno">Apellido Materno</label>
                    <input type="text" class="form-control" id="inputMaterno" required name="inputMaterno">
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTelefono">Telefono</label>
                    <input type="text" class="form-control" id="inputTelefono" required name="inputTelefono">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEdad">Edad</label>
                    <input type="text" class="form-control" id="inputEdad" name="inputEdad" required pattern="[0-9]+">

                </div>

            </div>

            <button id="back" type="button" class="btn btn-outline-info "><a href="{{ route('allTeacher') }}">
                    Atras</a></button>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>


    </div>
@endsection
