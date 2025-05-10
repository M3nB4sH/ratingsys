<?php

namespace App\Livewire\Ratings;

use App\Models\Activity;
use App\Models\Competence;
use App\Models\EducationalExperience;
use App\Models\Estimate;
use App\Models\Field;
use App\Models\Form;
use App\Models\Level;
use App\Models\Period;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\Week;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RatingCreate extends Component
{
    public $form_id, $name, $type,$data, $options, $dayanddate,$teachername, $level, $childrencount, $eduexp, $week, $skillname, $filmname, $activitytype, $period, $general, $goals, $activitygoals, $activityshow, $report,  $note, $recommendations;
    public $fields = [];
    public $estimate =[] ;
    public $day;
    public $activities = [];
    public $competences = [];

    public function render()
    {
        $form = Form::find(session()->get('form_id'));
        $allTeachers = Teacher::where([
            ['is_deleted', '=', 0],
            ['user_id', '=', Auth::id()],
        ])->get();
        $allEduexps = EducationalExperience::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allLevels = Level::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allPeriods = Period::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allWeeks = Week::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allEstimatesGrade = Estimate::where([
            ['is_deleted', '=', 0],
            ['is_graded', '=', 1],
        ])->get();
        $allEstimates = Estimate::where([
            ['is_deleted', '=', 0],
            ['is_graded', '=', 0],
        ])->get();
        $allCompetencies = Competence::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allFields = Field::where([
            ['is_deleted', '=', 0],
        ])->get();
        $allActivities = Activity::where([
            ['is_deleted', '=', 0],
        ])->get();
        $formOptions = json_decode($form->options,true);
        $this->dayanddate = date("Y-m-d");
        $this->form_id = $form->id;
        if(session()->get('teacher_id') != null) {
            $this->teachername = session()->get('teacher_id');
        }else{
            $this->teachername = 1;

        }
        $this->level = 1;
        $this->eduexp = 1;
        $this->period = 1;
        return view('livewire.ratings.rating-create', compact(['form', 'allTeachers','allEduexps','allEduexps','allLevels','allPeriods','allWeeks','allEstimates','allEstimatesGrade','allCompetencies','allFields','allActivities','formOptions']));
    }

    public function submit() {
        // $this->validate([
        //     'fields' => 'required',
        //     'dayanddate' => 'required',
        //     'level' => 'required',
        //     'childrencount' => 'required',
        //     'eduexp' => 'required',
        //     'week' => 'required',
        //     'activitytype' => 'required',
        //     'period' => 'required',
        //     'general' => 'required',
        //     'goals' => 'required',
        //     'activitygoals' => 'required',
        //     'activityshow' => 'required',
        //     'report' => 'required',
        //     'note' => 'required',
        //     'recommendations' => 'required',
        // ]);
        $arr = [
            'dayanddate' => $this->dayanddate,
            'teachername' => $this->teachername,
            'level' => $this->level,
            'childrencount' => $this->childrencount,
            'eduexp' => $this->eduexp,
            'week' => $this->week,
            'period' => $this->period,
            'activitytype' => $this->activitytype,
            'general' => $this->general,
            'filmname' => $this->filmname,
            'skillname' => $this->skillname,
            'estimate' => $this->estimate,
            'goals' => $this->goals,
            'activityshow' => $this->activityshow,
            'activitygoals' => $this->activitygoals,
            'report' => $this->report,
            'note' => $this->note,
            'recommendations' => $this->recommendations,


        ];
        $data = json_encode($arr);
        Rating::create([
            'user_id'=> Auth::id(),
            'form_id' => $this->form_id,
            'teacher_id' => $this->teachername,
            'data' => $data,
        ]);
        return to_route(route: 'rating.index')->with('success','تم تقييم المعلمة');

    }
}
