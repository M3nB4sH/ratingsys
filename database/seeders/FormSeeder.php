<?php

namespace Database\Seeders;

use App\Enums\Formtype;
use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ["تقويم فترة العمل الجماعي والعمل بالاركان",Formtype::Field,'{"note": "1", "week": "1", "goals": "1", "level": "1", "eduexp": "1", "fields": ["1", "2", "3", "4", "5"], "period": "1", "report": "1", "general": "1", "dayanddate": "1", "activityshow": "0", "activitytype": "0", "activitygoals": "0", "childrencount": "1", "recommendations": "1"}'],
            ["تقويم فترة النشاط اللاصفي",Formtype::Field,'{"note": "1", "week": "1", "goals": "0", "level": "1", "eduexp": "1", "fields": ["1", "3", "5", "2", "4"], "period": "0", "report": "0", "general": "1", "dayanddate": "1", "activityshow": "1", "activitytype": "1", "activitygoals": "1", "childrencount": "1", "recommendations": "1"}'],
            ["تقويم النشاط الحركي",Formtype::Activity,'{"note": "1", "week": "1", "level": "1", "eduexp": "1", "skillname": "1", "activities": ["1", "2", "3", "4"], "dayanddate": "1", "teachername": "1", "childrencount": "1", "recommendations": "1"}'],
            ["تقويم فترة نشاط المكتبة",Formtype::Competence,'{"note": "1", "week": "1", "level": "1", "eduexp": "1", "filmname": "1", "dayanddate": "1", "competences": ["39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50"], "teachername": "1", "childrencount": "1", "recommendations": "1"}'],
        ];
        foreach ($items as $key => $value) {
            Form::create([
                'name' => $value[0],
                'type' => $value[1],
                'options' => $value[2],
            ]);
        }
    }
}
