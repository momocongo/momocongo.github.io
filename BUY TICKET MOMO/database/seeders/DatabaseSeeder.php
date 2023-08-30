<?php

namespace Database\Seeders;

use App\Models\Organizer;
use App\Models\TypeEvent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::create([
            'name' => 'JOHANNE',
            'phone' => '067358735',
            'password' => Hash::make('azerty123'),
            'role' => 'organizer',
        ]);

        // Créer l'organisateur associé
        Organizer::create([
            'user_id' => $user->id,
            // Ajoutez d'autres champs spécifiques à l'organisateur
        ]);

        TypeEvent::create(['name' => 'CONCERT'], ['name' => 'MASTERCLASS']);
    }
}
