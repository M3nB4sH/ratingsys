<?php

namespace App\Livewire\EducationalExperience;

use App\Models\EducationalExperience;
use Livewire\Component;

class EducationalExperienceEdit extends Component
{
    public $eduexp, $name;

    public function mount($id){
        $this->eduexp = EducationalExperience::find($id);
        $this->name = $this->eduexp->name;
    }
    public function render()
    {
        return view('livewire.educational-experience.educational-experience-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->eduexp->name = $this->name;
        $this->eduexp->save();
        return to_route(route: 'eduexp.index')->with('success',value: 'تم تعديل الخبرة');
    }
}
