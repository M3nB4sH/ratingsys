<?php

namespace App\Livewire\EducationalExperience;

use App\Models\EducationalExperience;
use Livewire\Component;

class EducationalExperienceIndex extends Component
{
    public function render()
    {
        $items = EducationalExperience::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.educational-experience.educational-experience-index',compact('items'));
    }

    public function delete($id){
        $item=EducationalExperience::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة الخبرة التربوية");
    }
}
