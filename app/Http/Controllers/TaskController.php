<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
  // GET /api/tasks : Récupérer toutes les tâches
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // POST /api/tasks : Créer une tâche
    public function store(Request $request)
    {
        // Validation simple
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Création dans la BDD
        $task = Task::create([
            'title' => $request->title,
        ]);

        // Retourne la tâche créée avec un statut HTTP 201 (Créé)
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
