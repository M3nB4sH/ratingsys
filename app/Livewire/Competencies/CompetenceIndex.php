<?php

namespace App\Livewire\Competencies;

use App\Models\Competence;
use Livewire\Component;

class CompetenceIndex extends Component
{
    public function render()
    {
        $items = Competence::where([
            ['is_deleted', '=', 0],
        ])->get()->sortBy('is_graded');
        return view('livewire.competencies.competence-index', compact('items'));
    }

    public function delete($id){
        $item=Competence::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة الكفاية");
    }
}
