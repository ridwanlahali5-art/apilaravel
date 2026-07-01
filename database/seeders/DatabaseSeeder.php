<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crée un utilisateur de test par défaut
        User::factory()->create([
            'name' => 'Ali',
            'email' => 'ali2@example.com',
            'password' => bcrypt('password123'), // Mot de passe crypté
        ]);
    }
}