<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            "الأول",
            "الثاني",
            "الثالث",
        ];
        foreach ($items as $key => $value) {
            Week::create(['name' => $value]);
        }
    }
}
