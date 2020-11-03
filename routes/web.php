<?php

use Illuminate\Support\Facades\Route;
use App\Models\Projet_User;
use App\Models\Demande;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lateral_menu', 'MenuController@index')->name('lateral_menu');

// Espace Client

Route::get('liste_demandes', 'ListedemandeController@index')->name('listedesdemandes');
Route::get('equipe_projet', 'EquipeprojetController@index')->name('equipeprojet');
Route::get('liste_projets', 'ListeProjetController@index')->name('listeprojets');
// Route::get('demandeform', 'DemandeFormController@index');
Route::get('demandeform', 'DemandeController@showform');
Route::post('demandeform', 'DemandeController@storedemandeform');
// Route::post('demandeform', 'DemandeController@storedemandeform');

// Le Profil
Route::get('profil', 'ProfilController@index')->name('profil');
Route::get('editerprofil', 'ProfilController@showeditprofil')->name('editerprofil');

Route::resource('espaceclients', 'EspaceclientController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('dashboard', 'DashboardController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');

Route::resource('clients', 'ClientController');

Route::resource('espaceclients', 'EspaceclientController');

Route::resource('projets', 'ProjetController');

Route::resource('projetUsers', 'Projet_UserController');

Route::resource('projetUsers', 'Projet_UserController');

Route::resource('services', 'ServiceController');

Route::resource('planmaintenances', 'PlanmaintenanceController');

Route::resource('niveauImportances', 'Niveau_ImportanceController');

Route::resource('typeDemandes', 'Type_DemandeController');

Route::resource('demandes', 'DemandeController');

Route::resource('departements', 'DepartementController');

Route::resource('contrats', 'ContratController');
