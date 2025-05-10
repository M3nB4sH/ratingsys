<?php

namespace App\Livewire\Teachers;

use App\Models\Teacher;
use Livewire\Component;

class TeacherEdit extends Component
{
    public $teacher, $name;

    public function mount($id){
        $this->teacher = Teacher::find($id);
        $this->name = $this->teacher->name;
    }
    public function render()
    {
        return view('livewire.teachers.teacher-edit');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->teacher->name = $this->name;
        $this->teacher->save();
        return to_route(route: 'teacher.index')->with('success',value: 'Teacher Updated');
    }
}
