<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SignController;
use App\Models\ExamSimulation;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('Home.jsx');
Route::get('/catalogoGestion', [IndexController::class, 'cursosyDiplomados'])->name('CatalogoGP.jsx');
Route::get('/simulacros', [IndexController::class, 'simulacros'])->name('Simulacro.jsx');
Route::get('/detalleCurso/{id}', [IndexController::class, 'detalleCurso'])->name('CursoDetalle.jsx');
Route::get('/docente', [IndexController::class, 'docente'])->name('Docente.jsx');
Route::get('/detalleDocente/{id}', [IndexController::class, 'docenteDetalle'])->name('DocenteDetalle.jsx');
Route::get('/nosotros', [IndexController::class, 'nosotros'])->name('Nosotros.jsx');
Route::get('/contacto', [IndexController::class, 'contacto'])->name('Contacto.jsx');
Route::get('/recursos', [IndexController::class, 'recursos'])->name('Recursos.jsx');
Route::get('/examenFinalizado', [IndexController::class, 'examenFinalizado'])->name('ExamenFinalizado.jsx');
// Route::get('/examenPregunta', [IndexController::class, 'examenPregunta'])->name('ExamenPregunta.jsx');
Route::get('/dashDocente', [IndexController::class, 'dashDocente'])->name('DashboardDocente.jsx');
// Route::get('/dashEstudiante', [IndexController::class, 'dashEstudiante'])->name('DashboardEstudiante.jsx');
Route::get('/diploma', [IndexController::class, 'diploma'])->name('Diploma.jsx');

Route::get('/catalogo/{id?}', [IndexController::class, 'catalogo'])->name('Catalogo.jsx');
Route::get('/ofertas/{id?}', [IndexController::class, 'ofertas'])->name('Ofertas.jsx');

Route::middleware(['auth:sanctum', 'verified', 'can:Admin'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/modules', [ModuleController::class, 'reactView'])->name('Admin/Modules.jsx');
    Route::get('/signs', [SignController::class, 'reactView'])->name('Admin/Signs.jsx');
    Route::get('/products2', [ProductsController::class, 'reactView'])->name('Admin/Products.jsx');
    Route::get('/consumers', [ConsumerController::class, 'reactView'])->name('Admin/Consumers.jsx');
  });
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('micuenta')->group(function () {
  Route::get('/', [IndexController::class, 'dashEstudiante'])->name('DashboardEstudiante.jsx');
  Route::get('/session/{courseId}', [ModuleController::class, 'redirectModule'])->name('CursoDesarrollo.jsx');
  Route::get('/session/{courseId}/{sessionId}', [IndexController::class, 'desarrolloCurso'])->name('CursoDesarrollo.jsx');
  Route::get('/evaluation/{evaluationId}', [IndexController::class, 'evaluation'])->name('Evaluation.jsx');
  Route::get('/evaluation-finished/{evaluationId}', [IndexController::class, 'evaluationFinished'])->name('EvaluationFinished.jsx');

  
  Route::get('/simulation/{examId}', [IndexController::class, 'simulacro'])->name('SimulacroDesarrollo.jsx');
  Route::get('/examen-simulacro/{evaluationId}', [IndexController::class, 'simulacroDesarrollo'])->name('ExamenDesarrollo.jsx');
  Route::get('/examen-simulacro-terminado/{evaluationId}', [IndexController::class, 'simulacroTerminado'])->name('SimulacroTerminado.jsx');

});
