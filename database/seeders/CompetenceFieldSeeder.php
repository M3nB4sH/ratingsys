<?php

namespace Database\Seeders;

use App\Models\CompetenceField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenceFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [1,1],
            [2,1],
            [3,1],
            [4,1],
            [5,1],
            [6,2],
            [7,2],
            [8,2],
            [9,2],
            [10,2],
            [11,3],
            [12,3],
            [13,3],
            [14,3],
            [15,3],
            [16,3],
            [17,3],
            [18,3],
            [19,3],
            [20,3],
            [21,3],
            [22,3],
            [23,3],
            [24,3],
            [25,4],
            [26,4],
            [27,4],
            [28,4],
            [29,4],
            [30,4],
            [31,4],
            [32,4],
            [33,4],
            [34,5],
            [35,5],
            [36,5],
            [37,5],
            [38,5],
            [51,5],
        ];
        foreach ($items as $key => $value) {
            CompetenceField::create([
                'competence_id' => $value[0],
                'field_id' => $value[1],
            ]);
        }
    }
}
