@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('includes.message')
        <h3 id="title-prod" class="title-Alumno">Actualización de Maestros</h3>
        <form action="{{ route('saveChanges') }}" method="POST" id="altaMestros">
            {{ csrf_field() }}
            @foreach ($consulta as $maestro)
                <input type="hidden" id="inputId" name="inputId" value={{ $maestro->id }}>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputNombre">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" required
                            placeholder="Nombre" value={{ $maestro->nombre }}>
                    </div>
                    <div class="form-group col-md-4">

                        <label for="inputPaterno">Apellido Paterno</label>
                        <input type="text" class="form-control" id="inputPaterno" required name="inputPaterno"
                            value={{ $maestro->apePat }}>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" id="inputMaterno" required name="inputMaterno"
                            value={{ $maestro->apeMat }}>
                    </div>


                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTelefono">Telefono</label>
                        <input type="text" class="form-control" id="inputTelefono" required name="inputTelefono"
                            value={{ $maestro->telefono }}>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEdad">Edad</label>
                        <input type="text" class="form-control" id="inputEdad" name="inputEdad" required pattern="[0-9]+"
                            value={{ $maestro->edad }}>

                    </div>

                </div>
            @endforeach
            <button id="back" type="button" class="btn btn-outline-info "><a href="{{ route('allTeacher') }}">
                    Atras</a></button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>


    </div>
@endsection
