<?php

namespace App\Livewire\Teachers;

use App\Models\Form;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherIndex extends Component
{
    public function render()
    {
        $allForms = Form::where([
            ['is_deleted', '=', 0],
        ])->get();
        $items = Teacher::where([

            ['user_id', '=', Auth::id()],

            ['is_deleted', '=', 0],

        ])->get();
        return view('livewire.teachers.teacher-index', compact('items','allForms'));
    }

    public function delete($id){
        $item=Teacher::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "Teacher deleted");
    }
}
