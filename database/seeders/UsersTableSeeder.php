<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Voeg deze regel toe om de Hash-facade te importeren
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Laten we eerst de gebruikerstabel leegmaken
        User::truncate();

        $faker = \Faker\Factory::create();

        // Laten we ervoor zorgen dat iedereen hetzelfde wachtwoord heeft en 
        // laten we het hashen voordat de lus begint, anders zal onze seeder 
        // te langzaam zijn.
        $password = Hash::make('toptal'); // Gebruik de Hash-facade om het wachtwoord te hashen

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // En laten we nu een paar dozijn gebruikers genereren voor onze app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
