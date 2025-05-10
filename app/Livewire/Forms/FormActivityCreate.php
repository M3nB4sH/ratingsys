<?php

namespace App\Livewire\Forms;

use App\Enums\Formtype;
use App\Models\Activity;
use App\Models\Form;
use Livewire\Component;

class FormActivityCreate extends Component
{
    public $name, $type, $options, $dayanddate,$teachername, $level, $childrencount, $eduexp, $week, $skillname, $note, $recommendations;
    public $activities = [];

    public function render()
    {
        $allActivities = Activity::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-activity-create', compact('allActivities'));
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

        Form::create([
            'name'=> $this->name,
            'type' => Formtype::Activity,
            'options'=> $options,
        ]);
        return to_route(route: 'form.index')->with('success','تم اضافة تقويم النشاط');
    }
}
