<?php

namespace Database\Seeders;

use App\Models\CompetenceActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenceActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [52,1],
            [53,1],
            [54,1],
            [55,1],
            [56,1],
            [57,2],
            [58,2],
            [59,2],
            [60,2],
            [61,2],
            [62,2],
            [63,3],
            [64,3],
            [65,3],
            [66,3],
            [67,3],
            [68,3],
            [69,4],
            [70,4],
            [71,4],
            [72,4],
            [73,4],
            [74,4],
            [75,4],
        ];
        foreach ($items as $key => $value) {
            CompetenceActivity::create([
                'competence_id' => $value[0],
                'activity_id' => $value[1],
            ]);
        }
    }
}
