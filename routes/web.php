<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\MateriasController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Materia;

Route::get('/', function () {
    return view('auth.login');
    //return view('welcome');
    /*
    $materias = Materia::all();
    //var_dump($materias);
    foreach ($materias as $materia) {
        //var_dump($materia->materia);
        // var_dump($materia->capacitacion);
        foreach ($materia->capacitacion as $capa) {
            var_dump($capa->id_materia);
            var_dump($capa->materia->materia);
        }
    }
     */
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index']);


//MATERIAS
Route::get('/subjects', [MateriasController::class, 'viewSubjects'])->name('subjects');
Route::get('/allMaterias', [MateriasController::class, 'allSubjects'])->name('allMaterias');
Route::get('/createSubjects', [MateriasController::class, 'create'])->name('createSubjects');
Route::post('/saveSubjects', [MateriasController::class, 'save'])->name('saveSubjects');
Route::get('/editSubjects/{id}', [MateriasController::class, 'edit'])->name('editSubjects');
Route::post('/saveChangSubjet', [MateriasController::class, 'saveChanges'])->name('saveChangSubjet');
Route::get('/deleteSubjet/{id}', [MateriasController::class, 'destroy'])->name('deleteSubjet');

//ALUMNOS

Route::get('/students', [AlumnosController::class, 'viewStudents'])->name('students');
Route::get('/allStudent', [AlumnosController::class, 'allStudents'])->name('allStudent');
Route::get('/createStudents', [AlumnosController::class, 'create'])->name('createStudents');
Route::post('/saveStudents', [AlumnosController::class, 'save'])->name('saveStudents');
Route::get('/editStudents/{id}', [AlumnosController::class, 'edit'])->name('editStudents');
Route::post('/saveChang', [AlumnosController::class, 'saveChanges'])->name('saveChang');
Route::get('/delete/{id}', [AlumnosController::class, 'destroy'])->name('delete');

// AlumnosCursos
Route::get('/viewAsing', [CapacitacionController::class, 'viewAsingSub'])->name('viewAsing');
Route::post('/saveAsingsub', [CapacitacionController::class, 'saveAsing'])->name('saveAsingsub');
Route::get('/viewAll', [CapacitacionController::class, 'viewAllAssignation'])->name('viewAll');

Route::get('/allAlumnosCursos', [CapacitacionController::class, 'viewAlumnosCursos'])->name('allAlumnosCursos');
Route::get('/deleteAsingSub/{id}', [CapacitacionController::class, 'destroy'])->name('deleteAsingSub');
Route::get('/editAsingSub/{id}', [CapacitacionController::class, 'edit'])->name('editAsingSub');
Route::post('/saveChangAsingSub', [CapacitacionController::class, 'saveChanges'])->name('saveChangAsingSub');


//MAESTROS
Route::get('/allTeacher', [MaestrosController::class, 'viewTeacher'])->name('allTeacher');
Route::get('/filterAll', [MaestrosController::class, 'filterTeacher'])->name('filterAll');
Route::get('/createTeacher', [MaestrosController::class, 'create'])->name('createTeacher');
Route::post('/saveTeacher', [MaestrosController::class, 'save'])->name('saveTeacher');
Route::get('/editTeacher/{id}', [MaestrosController::class, 'edit'])->name('editTeacher');
Route::get('/deleteTeacher/{id}', [MaestrosController::class, 'destroy'])->name('deleteTeacher');
Route::post('/saveChanges', [MaestrosController::class, 'saveChanges'])->name('saveChanges');
