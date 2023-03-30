<?php

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
    return view('welcome');
});

Route::get('/form', function () {

    $nome = request('nome');
    $data = request('data');
    $mae = request('mae');
    $pai = request('pai');
    $ddd = request('ddd');
    $tel = request('tel');
    $email = request('email');

    return view('form', 
    ['nome' => $nome,
     'data' => $data,
     'mae' => $mae,
     'pai' => $pai,
     'ddd' => $ddd,
     'tel' => $tel,
     'email' => $email
    ]);
});

Route::post('/validacao', 'App\Http\Controllers\FormController@index');