<?php

use App\Http\Controllers\CerticationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProyectsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SkillsTypes;
use App\Models\Certification;

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

Route::get('/', [IndexController::class, "index"]);

Route::post('certifications', [CerticationsController::class, "store"])->name("certification.store");
Route::post('proyects', [ProyectsController::class, "store"])->name("proyects.store");
Route::post('skills', [SkillsController::class, "store"])->name("skills.store");
Route::delete('skills/delete/{id}', [SkillsController::class, "delete"])->name("skills.delete");
Route::delete('proyects/delete/{id}', [ProyectsController::class, "delete"])->name("proyects.delete");
Route::delete('certifications/delete/{id}', [CerticationsController::class, "delete"])->name("certifications.delete");
Route::post('skills/type', [SkillsTypes::class, "store"])->name("skills_types.store");

Route::post('sendMessages', [MessagesController::class, "store"])->name("sendMessages");

Auth::routes(["register" => false]);

Route::get('home', [HomeController::class, "index"])->name('home');
