<?php

namespace App\Livewire\Ratings;

use App\Models\Form;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RatingIndex extends Component
{
    public $forms;
    public function render()
    {
        $allForms = Form::where([
            ['is_deleted', '=', 0],
        ])->get();
        $items = Rating::where([
            ['is_deleted', '=', 0],
            ['user_id', '=', Auth::id()],
        ])->get();
        $DAYS   =   array('الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');
        $dName      =   date("w",);   // the number of the week-day ((from 0 to 6)). [0] for Sunday, [6] for Saturday //

        foreach ($items as $item) {
            $item->teacherName = Teacher::find($item->teacher_id)->name;
            $item->type = Form::find($item->form_id)->name;
            $dName      =   date("w",strtotime($item->created_at));
            $item->day = $DAYS[$dName];
        }
        return view('livewire.ratings.rating-index', compact(['items','allForms']));
    }

    public function submit(){
        if (User::find(Auth::id())->signature){
            if($this->forms == null){
                $this->forms = "1";
            }

            return to_route(route: 'rating.create')->with('form_id',$this->forms);
        }
        return to_route(route: 'sign.create')->with('success','يجب ان تنشئ توقيع رقمي قبل تقييم المعلمات');
    }
    public function delete($id){
        $item=Rating::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة التقييم");
    }
}
