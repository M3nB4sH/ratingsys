<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            "العمل الجماعي / الحلقة",
            "العمل بالأركان",
        ];
        foreach ($items as $key => $value) {
            Period::create(['name' => $value]);
        }
    }
}
