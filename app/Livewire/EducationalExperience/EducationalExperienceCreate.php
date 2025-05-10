<?php

namespace App\Livewire\EducationalExperience;

use App\Models\EducationalExperience;
use Livewire\Component;

class EducationalExperienceCreate extends Component
{
    public $name;
    public function render()
    {

        return view('livewire.educational-experience.educational-experience-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        EducationalExperience::create([
            'name'=> $this->name,
        ]);
        return to_route(route: 'eduexp.index')->with('success','تم اضافة الخبرة التربوية');
    }
}
