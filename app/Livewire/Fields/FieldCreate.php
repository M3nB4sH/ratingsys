<?php

namespace App\Livewire\Fields;

use App\Models\Competence;
use App\Models\CompetenceField;
use App\Models\Field;
use Livewire\Component;

class FieldCreate extends Component
{
    public $name;
    public $competences = [];
    public function render()
    {
        $competencies = Competence::where([
            ['is_deleted', '=', 0],
            ['is_graded' , '=', 0]
        ])->get();
        return view('livewire.fields.field-create',compact('competencies'));
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'competences' => 'required',
        ]);

        $field = Field::create([
            'name'=> $this->name,
        ]);
        foreach ($this->competences as $competence) {
            CompetenceField::create([
                'field_id'=> $field->id,
                'competence_id' => $competence,
            ]);
        }
        return to_route(route: 'field.index')->with('success','تم اضافة المجال');
    }
}
