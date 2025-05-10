<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            "1/1",
            "1/2",
            "1/3",
            "1/4",
            "1/5",
            "1/6",
            "2/1",
            "2/2",
            "2/3",
            "2/4",
            "2/5",
            "2/6",
        ];
        foreach ($items as $key => $value) {
            Level::create(['name' => $value]);
        }
    }
}
