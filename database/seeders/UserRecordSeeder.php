<?php

namespace Database\Seeders;

use App\Models\UserRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRecordSeeder extends Seeder
{
    private array $records = [
        [
            'quantity' => 150,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 3,
            'product_id' => 7,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 75,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 1,
            'product_id' => 12,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 50,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 2,
            'product_id' => 3,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 250,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 4,
            'product_id' => 9,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 100,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 1,
            'product_id' => 5,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 150,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 3,
            'product_id' => 14,
            'product_unit_id' => 3,
        ],
        [
            'quantity' => 60,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 2,
            'product_id' => 2,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 200,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 4,
            'product_id' => 11,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 115,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 1,
            'product_id' => 6,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 100,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 3,
            'product_id' => 13,
            'product_unit_id' => 3,
        ],
        [
            'quantity' => 130,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 2,
            'product_id' => 8,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 85,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 4,
            'product_id' => 1,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 2,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 1,
            'product_id' => 10,
            'product_unit_id' => 5,
        ],
        [
            'quantity' => 100,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 3,
            'product_id' => 15,
            'product_unit_id' => 3,
        ],
        [
            'quantity' => 50,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 2,
            'product_id' => 4,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 60,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 4,
            'product_id' => 5,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 30,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 1,
            'product_id' => 11,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 50,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 3,
            'product_id' => 3,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 30,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 2,
            'product_id' => 12,
            'product_unit_id' => 1,
        ],
        [
            'quantity' => 30,
            'date' => '2026-02-08',
            'user_id' => 1,
            'meal_id' => 4,
            'product_id' => 7,
            'product_unit_id' => 1,
        ],
    ];
    public function run(): void
    {
        foreach ($this->records as $record) {
            UserRecord::create($record);
        }
    }
}
