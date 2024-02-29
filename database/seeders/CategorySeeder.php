<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category' => 'Dinheiro',
                'services_id' => 2,
            ],
            [
                'category' => 'Cartão Normal',
                'services_id' => 2,
            ],
            [
                'category' => 'Cartão VISA',
                'services_id' => 2,
            ],
            [
                'category' => 'Kamba',
                'services_id' => 3,
            ],
            [
                'category' => 'Flex',
                'services_id' => 3,
            ],
        ];

        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
