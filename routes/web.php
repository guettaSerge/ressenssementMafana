<?php

use App\Models\Personne;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ValleeController;
use App\Http\Controllers\TranobeController;
use App\Http\Controllers\DomicileController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\PereFamilleController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CategorieDonController;
use App\Http\Controllers\DistributionDonController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UtilisateurController::class,'login']);
Route::post('/login',[UtilisateurController::class,'loginController']);
Route::get('/inscription',[UtilisateurController::class,'inscription']);
Route::post('/inscription',[UtilisateurController::class,'inscriptionController']);
Route::get('/updateUtilisateur',[UtilisateurController::class,'updateUtilisateur']);
Route::get('/disconnect',[UtilisateurController::class,'disconnect_users']);
// index
Route::get('/',[PersonneController::class,'indexhtml']);
// //genre
Route::get('/genre',[GenreController::class,'index']);
Route::get('/genre/create',[GenreController::class,'create']);
Route::post('/genre',[GenreController::class,'store']);
Route::get('/genre/edit',[GenreController::class,'edit']);
Route::post('/genre/update',[GenreController::class,'update']);
Route::get('/genre/show',[GenreController::class,'show']);

// //Tranobe
Route::get('/tranobe',[TranobeController::class,'index']);
Route::get('/tranobe/create',[TranobeController::class,'create']);
Route::post('/tranobe',[TranobeController::class,'store']);
Route::get('/tranobe/edit',[TranobeController::class,'edit']);
Route::post('/tranobe/update',[TranobeController::class,'update']);
Route::get('/tranobe/show',[TranobeController::class,'show']);

// //Region
Route::get('/region',[RegionController::class,'index']);
Route::get('/region/create',[RegionController::class,'create']);
Route::post('/region',[RegionController::class,'store']);
Route::get('/region/edit',[RegionController::class,'edit']);
Route::post('/region/update',[RegionController::class,'update']);
Route::get('/region/show',[RegionController::class,'show']);

// //Domicile
Route::get('/domicile',[DomicileController::class,'index']);
Route::get('/domicile/create',[DomicileController::class,'create']);
Route::post('/domicile',[DomicileController::class,'store']);
Route::get('/domicile/edit',[DomicileController::class,'edit']);
Route::post('/domicile/update',[DomicileController::class,'update']);
Route::get('/domicile/show',[DomicileController::class,'show']);

// //typeProfession
Route::get('/profession',[ProfessionController::class,'index']);
Route::get('/profession/create',[ProfessionController::class,'create']);
Route::post('/profession',[ProfessionController::class,'store']);
Route::get('/profession/edit',[ProfessionController::class,'edit']);
Route::post('/profession/update',[ProfessionController::class,'update']);
Route::get('/profession/show',[ProfessionController::class,'show']);


// //PereFamille
Route::get('/perefamille',[PereFamilleController::class,'index']);
Route::get('/perefamille/create',[PereFamilleController::class,'create']);
Route::post('/perefamille',[PereFamilleController::class,'store']);
Route::get('/perefamille/edit',[PereFamilleController::class,'edit']);
Route::post('/perefamille/update',[PereFamilleController::class,'update']);
Route::get('/perefamille/show',[PereFamilleController::class,'show']);

// //Charge
Route::get('/charge',[ChargeController::class,'index']);
Route::get('/charge/create',[ChargeController::class,'create']);
Route::post('/charge',[ChargeController::class,'store']);
Route::get('/charge/edit',[ChargeController::class,'edit']);
Route::post('/charge/update',[ChargeController::class,'update']);
Route::get('/charge/show',[ChargeController::class,'show']);

// //Cotisation
Route::get('/cotisation',[CotisationController::class,'index']);
Route::get('/cotisation/create',[CotisationController::class,'create']);
Route::post('/cotisation',[CotisationController::class,'store']);
Route::get('/cotisation/edit',[CotisationController::class,'edit']);
Route::post('/cotisation/update',[CotisationController::class,'update']);
Route::get('/cotisation/show',[lieuController::class,'show']);
// //CategorieDon
Route::get('/CategorieDon',[CategorieDonController::class,'index']);
Route::get('/CategorieDon/create',[CategorieDonController::class,'create']);
Route::post('/CategorieDon',[CategorieDonController::class,'store']);
Route::get('/CategorieDon/edit',[CategorieDonController::class,'edit']);
Route::post('/CategorieDon/update',[CategorieDonController::class,'update']);
Route::get('/CategorieDon/show',[CategorieDonController::class,'show']);

// //DistributionDon
Route::get('/DistributionDon',[DistributionDonController::class,'index']);
Route::get('/DistributionDon/create',[DistributionDonController::class,'create']);
Route::post('/DistributionDon',[DistributionDonController::class,'store']);
Route::get('/DistributionDon/edit',[DistributionDonController::class,'edit']);
Route::post('/DistributionDon/update',[DistributionDonController::class,'update']);
Route::get('/DistributionDon/show',[DistributionDonController::class,'show']);

// //Personne
Route::get('/personne',[PersonneController::class,'index']);
Route::get('/personne/create',[PersonneController::class,'create']);
Route::post('/personne',[PersonneController::class,'store']);
Route::get('/personne/edit',[PersonneController::class,'edit']);
Route::post('/personne/update',[PersonneController::class,'update']);
Route::get('/personne/show',[PersonneController::class,'show']);

// //Don
Route::get('/Don',[DonController::class,'index']);
Route::get('/Don/create',[DonController::class,'create']);
Route::post('/Don',[DonController::class,'store']);
Route::get('/Don/edit',[DonController::class,'edit']);
Route::post('/Don/update',[DonController::class,'update']);
Route::get('/Don/show',[DonController::class,'show']);

//Vallee
Route::get('/vallee',[ValleeController::class,'index']);
Route::get('/vallee/create',[ValleeController::class,'create']);
Route::post('/vallee',[ValleeController::class,'store']);
Route::get('/vallee/edit',[ValleeController::class,'edit']);
Route::post('/vallee/update',[ValleeController::class,'update']);
Route::get('/vallee/show',[ValleeController::class,'show']);


