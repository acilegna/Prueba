 @extends('layouts.app')

 @section('content')
     <div class="container-fluid">
         <h3 id="title-prod" class="title-Alumno">Módulo de Materias</h3>
         <div class="contenido ">

             @include('includes.message')
             <div class="col-lg-2">
                 <input type="text" name="inputSubjects" id="inputSubjects" class="derecha"
                     placeholder="Busqueda.. " />
             </div>
             <div class="col-lg-4">
                 <div class="btn-group btn-nuevo"><a href="{{ route('createSubjects') }}" class=" btn btn-primary"><i
                             class="fa fa-cube"></i> Nueva Materia
                     </a> </div>
             </div>
         </div>

         <div class="table-responsive-lg ">
             <table class="table table-striped table-bordered">
                 <thead>
                     <tr>

                         <th>Materia</th>
                         <th id="mitable">Acciones</th>
                     </tr>
                 </thead>
                 <tbody id="tbodyMaterias">

                 </tbody>
                 <tfoot>
                     <tr>
                         <th colspan="6">
                             <h5 class="izquierda">Registros encontrados: <span id="total_subjects"></span></h5>
                         </th>
                     </tr>
                 </tfoot>
             </table>
         </div>
     </div>
 @endsection
