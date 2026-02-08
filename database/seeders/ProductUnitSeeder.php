<?php

namespace Database\Seeders;

use App\Models\ProductUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUnitSeeder extends Seeder
{
    private array $units = [
        ['unit' => 'Граммы', 'short_unit' => 'г',],
        ['unit' => 'Миллилитры', 'short_unit' => 'мл',],
        ['unit' => 'Штуки', 'short_unit' => 'шт',],
    ];
    public function run(): void
    {
        foreach ($this->units as $unit) {
            ProductUnit::create($unit);
        }
    }
}
