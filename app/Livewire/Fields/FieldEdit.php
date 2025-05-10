<?php

namespace App\Livewire\Fields;

use App\Models\Competence;
use App\Models\CompetenceField;
use App\Models\Field;
use Livewire\Component;

class FieldEdit extends Component
{
    public $field, $name, $competencies;
    public $competences = [];

    public function mount($id){
        $this->field = Field::find($id);
        $this->name = $this->field->name;
        $this->competences = $this->field->competences->pluck('id');
        $this->competencies = Competence::where([
            ['is_deleted', '=', 0],
            ['is_graded' , '=', 0]
        ])->get();
    }


    public function render()
    {

        return view('livewire.fields.field-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'competences' => 'required',
        ]);
        $this->field->name = $this->name;
        $this->field->competences()->detach();
        foreach ($this->competences as $competence) {
            CompetenceField::create([
                'field_id'=> $this->field->id,
                'competence_id' => $competence,
            ]);
        }
        $this->field->save();
        return to_route(route: 'field.index')->with('success',value: 'تم تعديل المجال');
    }

}
