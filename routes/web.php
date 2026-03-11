<?php

use App\Http\Controllers\Admin\FiliereController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Admin\GroupeController;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\SeanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth","admin"])->group(function(){
    // ------------------    Filiere Routes  ---------------
    Route::resource("filieres",FiliereController::class);
    Route::get("/filieres/option/{annee}",[FiliereController::class,"getOptionAnnee"]);
    // ------------------    Groupe Routes  ---------------
    Route::resource("groupes",GroupeController::class);
    // ------------------    Formateur Routes  ---------------
    Route::resource("formateurs",FormateurController::class);
    // ------------------    Salle Routes  ---------------
    Route::resource("salles",SalleController::class);
    // ------------------    Seance Routes  ---------------
    Route::resource("seances",SeanceController::class);
});


require __DIR__.'/auth.php';
