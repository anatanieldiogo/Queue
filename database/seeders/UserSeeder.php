<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Anataniel Diogo',
                'email' => 'anatanielmendes10@gmail.com',
                'password' => '$2y$12$Mnliz5fqsWvzAo78tvs7ROk.ycFZVQTrxszekii3bktoPmJsKMLku', //12345678
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
