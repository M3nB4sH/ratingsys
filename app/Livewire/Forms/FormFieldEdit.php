<?php

namespace App\Livewire\Forms;

use App\Models\Field;
use App\Models\Form;
use Livewire\Component;

class FormFieldEdit extends Component
{
    public $form, $name, $type, $options, $dayanddate, $level, $childrencount, $eduexp, $week, $activitytype, $period, $general, $goals, $activitygoals, $activityshow, $report, $note, $recommendations;
    public $fields = [];

    public $allFields;

    public function mount($id){
        $this->form = Form::find($id);
        $this->name = $this->form->name;
        $aray =json_decode($this->form->options);
        $this->fields = $aray->fields;
        $this->dayanddate = $aray->dayanddate;
        $this->level = $aray->level;
        $this->childrencount = $aray->childrencount;
        $this->eduexp = $aray->eduexp;
        $this->week = $aray->week;
        $this->activitytype = $aray->activitytype;
        $this->period = $aray->period;
        $this->general = $aray->general;
        $this->goals = $aray->goals;
        $this->activitygoals = $aray->activitygoals;
        $this->activityshow = $aray->activityshow;
        $this->report = $aray->report;
        $this->note = $aray->note;
        $this->recommendations = $aray->recommendations;
        $this->allFields = Field::where([
            ['is_deleted', '=', 0],
        ])->get();
    }
    public function render()
    {
        return view('livewire.forms.form-field-edit');
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

        $this->form->name = $this->name;
        $this->form->options = $options;
        $this->form->save();
        return to_route(route: 'form.index')->with('success','تم تعديل تقويم النشاط');
    }

}
