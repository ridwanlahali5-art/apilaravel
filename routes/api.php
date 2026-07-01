<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

// Notre toute première route API !
Route::get('/hello', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Bienvenue sur votre API Laravel !',
        'formation' => 'Next.js & Laravel en 5 jours'
    ]);
});

// Notre deuxième route API !
Route::get('/user-test', function () {
    return response()->json([
        'name' => 'Ali Ridwan',
        'role' => 'developpeur web',
        'competences' => 'Laravel, Next.js, React, Vue.js, Node.js, Express.js'
    ]);
});