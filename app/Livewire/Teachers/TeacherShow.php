<?php

namespace App\Livewire\Teachers;

use App\Models\Form;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherShow extends Component
{
    public $teacher, $allForms,$forms,$items;

    public function mount($id){
        $this->allForms = Form::where([
            ['is_deleted', '=', 0],
        ])->get();
        $this->teacher = Teacher::find($id);
        $this->items = Rating::where([
            ['is_deleted', '=', 0],
            ['teacher_id', '=', $this->teacher->id],
            ['user_id', '=', Auth::id()],
        ])->get();
        $DAYS   =   array('الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');
        $dName      =   date("w",);   // the number of the week-day ((from 0 to 6)). [0] for Sunday, [6] for Saturday //

        foreach ($this->items as $item) {
            $item->teacherName = Teacher::find($item->teacher_id)->name;
            $item->type = Form::find($item->form_id)->name;
            $dName      =   date("w",strtotime($item->created_at));
            $item->day = $DAYS[$dName];
        }
    }
    public function render()
    {
        return view('livewire.teachers.teacher-show');
    }
    public function submit(){
        if (User::find(Auth::id())->signature){
            if($this->forms == null){
                $this->forms = "1";
            }

            return to_route(route: 'rating.create')->with(['form_id'=>$this->forms,'teacher_id' => $this->teacher->id]);
        }
        return to_route(route: 'sign.create')->with('success','يجب ان تنشئ توقيع رقمي قبل تقييم المعلمات');
    }
}
