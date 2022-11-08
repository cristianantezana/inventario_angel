<?php

use Illuminate\Support\Facades\Route;
use App\Models\Persona;
use App\Models\Catalogo;
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
    //return view('welcome');
    $persona = Catalogo::find(2);
    
    dd($persona);
   // print_r($persona);
    //add($persona);
});
