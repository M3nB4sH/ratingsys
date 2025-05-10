<?php

namespace App\Livewire\Activities;

use App\Models\Activity;
use App\Models\Competence;
use App\Models\CompetenceActivity;
use Livewire\Component;

class ActivityEdit extends Component
{
    public $activity, $name, $grade, $competencies;
    public $competences = [];

    public function mount($id){
        $this->activity = Activity::find($id);
        $this->name = $this->activity->name;
        $this->grade = $this->activity->grade;
        $this->competences = $this->activity->competences->pluck('id');
        $this->competencies = Competence::where([
            ['is_deleted', '=', 0],
            ['is_graded' , '=', 1]
        ])->get();
    }
    public function render()
    {
        return view('livewire.activities.activity-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'grade'=> 'required',
            'competences' => 'required',
        ]);
        $this->activity->name = $this->name;
        $this->activity->grade = $this->grade;
        $this->activity->competences()->detach();
        foreach ($this->competences as $competence) {
            CompetenceActivity::create([
                'activity_id'=> $this->activity->id,
                'competence_id' => $competence,
            ]);
        }
        $this->activity->save();
        return to_route(route: 'activity.index')->with('success',value: 'تم تعديل النشاط');
    }

}
