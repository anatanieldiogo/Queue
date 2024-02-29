<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service' => 'Deposito',
                'letters_id' => 1,
            ],
            [
                'service' => 'Levantamento',
                'letters_id' => 2,
            ],
            [
                'service' => 'Visa',
                'letters_id' => 3,
            ],
            [
                'service' => 'Informação',
                'letters_id' => 4,
            ],
            [
                'service' => 'Abertura e Manutenção de Conta',
                'letters_id' => 5,
            ],
        ];

        foreach ($services as $key => $service) {
            Service::create($service);
        }
    }
}
