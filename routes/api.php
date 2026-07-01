<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\TaskController;

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



// Toutes les routes à l'intérieur de ce groupe nécessitent d'être connecté !
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('tasks', TaskController::class);
});

// Route pour la connexion (login)
Route::post('/login', function (Request $request) {
    // 1. Valider les données reçues
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 2. Vérifier si l'utilisateur existe
    $user = User::where('email', $request->email)->first();

    // 3. Vérifier le mot de passe
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Identifiants incorrects'], 401);
    }

    // 4. Générer le fameux jeton (Token)
    $token = $user->createToken('auth_token')->plainTextToken;

    // 5. Renvoyer le token au Frontend
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
});