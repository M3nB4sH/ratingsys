<?php

namespace App\Livewire\Teachers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherCreate extends Component
{
    public $name, $user_id;
    public function render()
    {
        return view('livewire.teachers.teacher-create');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Teacher::create([
            'name'=> $this->name,
            'user_id' => Auth::id(),
        ]);
        return to_route(route: 'teacher.index')->with('success','Teacher Created');
    }
}
