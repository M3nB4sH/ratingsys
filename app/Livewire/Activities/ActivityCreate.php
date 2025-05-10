<?php

namespace App\Livewire\Activities;

use App\Models\Activity;
use App\Models\Competence;
use App\Models\CompetenceActivity;
use Livewire\Component;

class ActivityCreate extends Component
{
    public $name, $grade;
    public $competences = [];

    public function render()
    {
        $competencies = Competence::where([
            ['is_deleted', '=', 0],
            ['is_graded' , '=', 1]
        ])->get();
        return view('livewire.activities.activity-create',compact('competencies'));
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'competences' => 'required',
        ]);

        $activity = Activity::create([
            'name'=> $this->name,
            'grade'=> $this->grade,
        ]);
        foreach ($this->competences as $competence) {
            CompetenceActivity::create([
                'activity_id'=> $activity->id,
                'competence_id' => $competence,
            ]);
        }
        return to_route(route: 'activity.index')->with('success','تم اضافة النشاط');
    }
}
