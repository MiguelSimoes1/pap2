<?php

use App\Http\Controllers\AluAtividadesController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\AuxiliaresController;;
use App\Http\Controllers\JprofessoresController;
use App\Http\Controllers\JauxiliaresController;
use App\Http\Controllers\JalunosController;
use App\Http\Controllers\ApaController;
use App\Http\Controllers\AlunosdbController;
use App\Http\Controllers\ProfessordbController;
use App\Http\Controllers\AuxiliaresdbController;
use App\Http\Controllers\AlJogosController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\ProfAtividadesController;
use App\Http\Controllers\ProfJogosController;
use App\Http\Controllers\AuxAtividadesController;
use App\Http\Controllers\AuxJogosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Apa');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Routes que da pagina de escolha de identidade

Route::resource('alunos' , AlunosController::class);
Route::resource('professores' , ProfessoresController::class);
Route::resource('auxiliares' , AuxiliaresController::class);

//Routes das paginas de escolha dos jogos

Route::resource('jalunos', JalunosController::class);
Route::resource('jprofessores', JprofessoresController::class);
Route::resource('jauxiliares', JauxiliaresController::class);

//Routes da administração

Route::resource('administrador', AdministradorController::class);
// Route::em('login', LoginController::class);
Route::resource('admin', AluAtividadesController::class);
Route::resource('aljogos', AlJogosController::class);
Route::resource('profatividades', ProfAtividadesController::class);
Route::resource('profjogos', ProfJogosController::class);
Route::resource('auxatividades', AuxAtividadesController::class);
Route::resource('auxjogos', AuxJogosController::class);
Route::resource('alunodb', AlunosdbController::class);
Route::resource('professoresdb', ProfessordbController::class);
Route::resource('auxiliaresdb', AuxiliaresdbController::class);

//Apa

Route::resource('apa', ApaController::class);
