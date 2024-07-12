<?php

namespace Database\Seeders;

use App\Models\TypeBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeBannerSeeder extends Seeder
{

    use WithoutModelEvents;

    public function run(): void
    {
        $rows = [
            ['name' => 'Full banner 1'],
            ['name' => 'Full banner 2'],
            ['name' => 'Full banner 3'],
            ['name' => 'Quadrado 1'],
            ['name' => 'Torre 1'],
        ];

        TypeBanner::query()
            ->upsert($rows, ['name'], ['name']);
    }
}
