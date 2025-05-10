<?php

namespace App\Livewire\Competencies;

use App\Models\Competence;
use Livewire\Component;

class CompetenceEdit extends Component
{
    public $competence, $name, $is_graded;

    public function mount($id){
        $this->competence = Competence::find($id);
        $this->name = $this->competence->name;
        $this->is_graded = $this->competence->is_graded;
    }

    public function render()
    {
        return view('livewire.competencies.competence-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'is_graded' => 'required',
        ]);
        $this->competence->name = $this->name;
        $this->competence->is_graded = $this->is_graded;
        $this->competence->save();
        return to_route(route: 'competence.index')->with('success',value: 'تم تعديل الكفاية');
    }

}
