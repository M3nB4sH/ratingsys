<?php

namespace Database\Seeders;

use App\Models\EducationalExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eduexp = [
            "الحاسوب في روضتي",
            "أنا الإنسان",
            "الناس يعملون",
            "الماء والهواء",
            "حيوانات ونباتات",
            "الإسلام ديني",
            "البحر",
            "غذائي",
            "النفط",
            "الفصول الأربعة",
            "الإتصالات",
            "بلدي الكويت",
            "الاحتفال بالأعياد الوطنية",
            "روضتي",
            "من أنا؟",
            "أسرتي وأقاربي وجيراني",
            "صحتي وسلامتي",
            "البر",
            "أصوات وأشكال وألوان",
            "المواصلات",
            "شهر رمضان",
            "الأعياد الوطنية",
            "عيد الفطر",
            "عيد الأضحى",
        ];
        foreach ($eduexp as $key => $value) {
            EducationalExperience::create(['name' => $value]);
        }
    }
}
