<?php

namespace App\Livewire\Forms;

use App\Models\Activity;
use App\Models\Form;
use Livewire\Component;

class FormActivityEdit extends Component
{
    public $form, $name, $type, $options, $dayanddate,$teachername, $level, $childrencount, $eduexp, $week, $skillname, $note, $recommendations;
    public $activities = [];

    public $allActivities;
    public function mount($id){
        $this->form = Form::find($id);
        $this->name = $this->form->name;
        $aray =json_decode($this->form->options);
        $this->activities = $aray->activities;
        $this->dayanddate = $aray->dayanddate;
        $this->level = $aray->level;
        $this->childrencount = $aray->childrencount;
        $this->eduexp = $aray->eduexp;
        $this->week = $aray->week;
        $this->teachername = $aray->teachername;
        $this->skillname = $aray->skillname;
        $this->note = $aray->note;
        $this->recommendations = $aray->recommendations;
        $this->allActivities = Activity::where([
            ['is_deleted', '=', 0],
        ])->get();
    }
    public function render()
    {
        $allActivities = Activity::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-activity-edit', compact('allActivities'));
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'activities' => 'required',
            'dayanddate' => 'required',
            'level' => 'required',
            'childrencount' => 'required',
            'eduexp' => 'required',
            'week' => 'required',
            'teachername' => 'required',
            'skillname' => 'required',
            'note' => 'required',
            'recommendations' => 'required',
        ]);
        $arr = [
            'activities' => $this->activities,
            'dayanddate' => $this->dayanddate,
            'level' => $this->level,
            'childrencount' => $this->childrencount,
            'eduexp' => $this->eduexp,
            'week' => $this->week,
            'teachername' => $this->teachername,
            'skillname' => $this->skillname,
            'note' => $this->note,
            'recommendations' => $this->recommendations];
        $options = json_encode($arr);

        $this->form->name = $this->name;
        $this->form->options = $options;
        $this->form->save();
        return to_route(route: 'form.index')->with('success','تم تعديل تقويم النشاط');
    }

}
