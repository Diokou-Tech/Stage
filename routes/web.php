<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\ClasseController;

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EncadreurController;
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

    
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'home'])->name('home-admin');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard-admin');
    Route::get('/admins', [App\Http\Controllers\AdminController::class, 'index'])->name('home-admin2');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'dashboard'])->name('home-user');

//test email

// Route::get('mail', function () {

//     		#2. Récupération des utilisateurs
// 		$users = User::all();


// 		#3. Envoi du mail
// 		Mail::to($users)->bcc("wilo.ahadi@gmail.com")
// 						->queue(new MessageGoogle());
// 		return back()->withText("Message envoyé");
// });

//
Route::get('/', function () {
    return view("auth.login");
});
Auth::routes();

//Group de Rotas apenas usuario logado tem acesso
Route::middleware(['auth'])->group(function(){
    //Grupo de rotas do clientes
    Route::middleware(['prevent-back'])->prefix('enseignants')->group(function(){
        Route::get('', [EnseignantController::class, 'index'])->name('prof-index');
        Route::get('/create', [EnseignantController::class, 'create'])->name('prof-create');
        Route::post('/store', [EnseignantController::class, 'store'])->name('prof-store');
        Route::get('/{id}/edit', [EnseignantController::class, 'edit'])->name('prof-edit');
        Route::put('/{id}/update', [EnseignantController::class, 'update'])->name('prof-update');
        Route::delete('/{id}', [EnseignantController::class, 'destroy'])->name('prof-destroy');
        //profils routes
        Route::get('/profil',[EnseignantController::class, 'profil'])->name('profil-enseignant');
        Route::get('/profil/update',[EnseignantController::class, 'profil_update'])->name('profil-update-enseignant');
        Route::post('/profil/update',[EnseignantController::class, 'update_profil'])->name('update-profil-enseignant');;
    });
    
    Route::middleware(['prevent-back'])->prefix('classes')->group(function(){
        Route::get('', [ClasseController::class, 'index'])->name('classe-index');
        Route::get('/create', [ClasseController::class, 'create'])->name('classe-create');
        Route::post('/store', [ClasseController::class, 'store'])->name('classe-store');
        Route::get('/{id}/edit', [ClasseController::class, 'edit'])->name('classe-edit');
        Route::put('/{id}/update', [ClasseController::class, 'update'])->name('classe-update');
        Route::delete('/{id}', [ClasseController::class, 'destroy'])->name('classe-destroy');
        
    });
    Route::middleware(['prevent-back'])->prefix('etudiants')->group(function(){
        Route::get('', [EtudiantController::class, 'index'])->name('etudiant-index');
        Route::get('/create', [EtudiantController::class, 'create'])->name('etudiant-create');
        Route::post('/store', [EtudiantController::class, 'store'])->name('etudiant-store');
        Route::get('/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant-edit');
        Route::put('/{id}/update', [EtudiantController::class, 'update'])->name('etudiant-update');
        Route::delete('/{id}', [EtudiantController::class, 'destroy'])->name('etudiant-destroy');
        Route::get('/show',[EtudiantController::class, 'geraPdf'])->name('etudiant-show');
        //profils routes
        Route::get('/profil',[EtudiantController::class, 'profil'])->name('profil');
        Route::get('/profil/update',[EtudiantController::class, 'profil_update'])->name('profil-update');
        Route::post('/profil/update',[EtudiantController::class, 'update_profil'])->name('update-profil');
        
    });
    Route::middleware(['prevent-back'])->prefix('stages')->group(function(){
        Route::get('', [StageController::class, 'index'])->name('stage-index');
        Route::get('/create', [StageController::class, 'create'])->name('stage-create');
        Route::post('/store', [StageController::class, 'store'])->name('stage-store');
        Route::get('/{id}/show',     [StageController::class, 'show'])->name('stage-show');
        Route::get('/{id}/edit', [StageController::class, 'edit'])->name('stage-edit');
        Route::put('/{id}/update', [StageController::class, 'update'])->name('stage-update');
        Route::delete('/{id}', [StageController::class, 'destroy'])->name('stage-destroy');
        Route::get('/offre',     [StageController::class, 'offre'])->name('stage-offre');
        Route::get('/contact',     [StageController::class, 'contact'])->name('stage-contact');
        
    });
    //admin routes 
    Route::middleware(['prevent-back'])->prefix('pages')->group(function(){
        Route::get('/home', [AdminController::class, 'homeEtudiant'])->name('etudiant-accueil');
        Route::get('/accueil', [AdminController::class, 'homeAdmin'])->name('admin-accueil');
        Route::get('/profil', [AdminController::class, 'profil'])->name('page-profil');
        Route::get('/stage', [AdminController::class, 'stage'])->name('page-stage');
        Route::get('/login', [AdminController::class, 'login'])->name('page-login');
        Route::get('/depot', [AdminController::class, 'depot'])->name('page-depot');
        Route::get('/contact', [AdminController::class, 'contact'])->name('page-contact');
        Route::get('/tableau', [AdminController::class, 'tableau'])->name('page-tableau');
        Route::get('/telechargement',[AdminController::class, 'telechargement'])->name('page-telechargement');
    });
    // routes encadreurs
    Route::middleware(['prevent-back'])->prefix('encadreur')->group(function(){
        Route::get('/', [EncadreurController::class, 'index'])->name('encadreur-index');
        Route::get('/dashboard',[EncadreurController::class, 'dashboard'])->name('encadreur-dashboard');
        Route::get('/{id}/show',[EncadreurController::class, 'show'])->name('encadreur-show');
        Route::get('/affecter',[EncadreurController::class, 'affecterIndex'])->name('encadreur-affecter-index');
        Route::get('/{id}/affecter',[EncadreurController::class, 'affecter'])->name('encadreur-affecter');
        Route::post('/{id}/affecter',[EncadreurController::class, 'affecterEtudiant'])->name('encadreur-affecter');
        Route::get('/{id}/signer',[EncadreurController::class, 'signer'])->name('encadreur-signer');
        Route::post('/{id}/signer',[EncadreurController::class, 'signer'])->name('encadreur-signer');
        Route::post('/{id}/signer',[EncadreurController::class, 'signer'])->name('encadreur-signer');
        Route::get('/print',[EncadreurController::class, 'print'])->name('encadreur-print');
        Route::get('/excel',[EncadreurController::class, 'exportExcel'])->name('encadreur-excel');
    });

    Route::middleware(['prevent-back'])->prefix('users')->group(function(){
        Route::get('', [UserController::class, 'index'])->name('user-index');
        // Route::get('/delete', [UserController::class, 'create'])->name('user-create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user-edit');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('user-update');
        Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user-destroy');
    });
    Route::get('mail',[UserController::class, 'maill']);
});