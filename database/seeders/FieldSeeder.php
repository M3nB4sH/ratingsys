<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            "أولا: في مجال الصفات الشخصية:",
            "ثانيا: في مجال التخطيط والاعداد للخبرات التربوية:",
            "ثالثا: في مجال عرض الخبرة وإدارة الفصل:",
            "رابعا: في مجال إعداد الأركان التربوية:",
            "خامسا: في مجال التقويم:",
        ];
        foreach ($items as $key => $value) {
            Field::create(['name' => $value]);
        }
    }
}
