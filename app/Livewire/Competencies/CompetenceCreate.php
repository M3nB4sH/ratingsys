<?php

namespace App\Livewire\Competencies;

use App\Models\Competence;
use Livewire\Component;

class CompetenceCreate extends Component
{
    //تجربة is_graded = 0 من اجل ال select
    public $name, $is_graded;

    public function render()
    {
        return view('livewire.competencies.competence-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'is_graded' => 'required',
        ]);
        Competence::create([
            'name'=> $this->name,
            'is_graded' => $this->is_graded,
        ]);
        return to_route(route: 'competence.index')->with('success','تم اضافة الكفاية');
    }
}
