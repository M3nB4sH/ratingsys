<?php

namespace Database\Seeders;

use App\Models\Estimate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstimateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ["متميز",0,0],
            ["ممتاز",0,0],
            ["جيد جدا",0,0],
            ["جيد",0,0],
            ["مقبول",0,0],
            ["درجة كبيرة جدا",5,1],
            ["درجة كبيرة",4,1],
            ["درجة متوسطة",3,1],
            ["درجة منخفضة",2,1],
            ["درجة منخفضة جدا",1,1],

        ];
        foreach ($items as $key => $value) {
            Estimate::create([
                'name' => $value[0],
                'grade' => $value[1],
                'is_graded' => $value[2],
            ]);
        }
    }
}
