<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nom' => "Biteye",
                'prenom' => "Ndeye",
                'email' => "ndeye@gmail.com",
                "role" => "admin",
                "date_naissance"=>"2002-12-12",
                "adresse"=>"ziguinchor",
                'photo' => 'default.jpg', // Ajoutez cette ligne avec une valeur par défaut ou spécifique
                "matricule"=>"1234567Admin",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],];

            foreach ($users as $user) {
                User::create($user);
            }
          

    }
}
