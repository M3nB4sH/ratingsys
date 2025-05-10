<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ["النشاط الحركي",5],
            ["النشاط العليمي",15],
            ["النشاط التطبيقي",15],
            ["النشاط الختامي",5],
        ];
        foreach ($items as $key => $value) {
            Activity::create([
                'name' => $value[0],
                'grade' => $value[1],
            ]);
        }
    }
}
