<?php

namespace App\Livewire\Forms;

use App\Enums\Formtype;
use App\Models\Field;
use App\Models\Form;
use Livewire\Component;

class FormFieldCreate extends Component
{
    public $name, $type, $options, $dayanddate, $level, $childrencount, $eduexp, $week, $activitytype, $period, $general, $goals, $activitygoals, $activityshow, $report, $note, $recommendations;
    public $fields = [];
    public function render()
    {
        $allFields = Field::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-field-create', compact('allFields'));
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'fields' => 'required',
            'dayanddate' => 'required',
            'level' => 'required',
            'childrencount' => 'required',
            'eduexp' => 'required',
            'week' => 'required',
            'activitytype' => 'required',
            'period' => 'required',
            'general' => 'required',
            'goals' => 'required',
            'activitygoals' => 'required',
            'activityshow' => 'required',
            'report' => 'required',
            'note' => 'required',
            'recommendations' => 'required',
        ]);
        $arr = [
            'fields' => $this->fields,
            'dayanddate' => $this->dayanddate,
            'level' => $this->level,
            'childrencount' => $this->childrencount,
            'eduexp' => $this->eduexp,
            'week' => $this->week,
            'activitytype' => $this->activitytype,
            'period' => $this->period,
            'general' => $this->general,
            'goals' => $this->goals,
            'activitygoals' => $this->activitygoals,
            'activityshow' => $this->activityshow,
            'report' => $this->report,
            'note' => $this->note,
            'recommendations' => $this->recommendations];
        $options = json_encode($arr);

        Form::create([
            'name'=> $this->name,
            'type' => Formtype::Field,
            'options'=> $options,
        ]);
        return to_route(route: 'form.index')->with('success','تم اضافة التقويم');
    }
}
