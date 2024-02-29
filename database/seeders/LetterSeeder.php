<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letters = [
            [
                'letter' => 'A',
            ],
            [
                'letter' => 'B',
            ],
            [
                'letter' => 'C',
            ],
            [
                'letter' => 'D',
            ],
            [
                'letter' => 'E',
            ],
            [
                'letter' => 'F',
            ],
            [
                'letter' => 'G',
            ],
            [
                'letter' => 'H',
            ],
            [
                'letter' => 'I',
            ],
            [
                'letter' => 'J',
            ],
            [
                'letter' => 'K',
            ],
            [
                'letter' => 'L',
            ],
            [
                'letter' => 'M',
            ],
            [
                'letter' => 'N',
            ],
            [
                'letter' => 'O',
            ],
            [
                'letter' => 'P',
            ],
            [
                'letter' => 'Q',
            ],
            [
                'letter' => 'R',
            ],
            [
                'letter' => 'S',
            ],
            [
                'letter' => 'T',
            ],
            [
                'letter' => 'U',
            ],
            [
                'letter' => 'V',
            ],
            [
                'letter' => 'W',
            ],
            [
                'letter' => 'X',
            ],
            [
                'letter' => 'Y',
            ],
            [
                'letter' => 'Z',
            ],
        ];

        foreach ($letters as $key => $letter) {
            Letter::create($letter);
        }
    }
}
