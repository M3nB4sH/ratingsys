<?php

namespace App\Livewire\Estimates;

use App\Models\Estimate;
use Livewire\Component;

class EstimateIndex extends Component
{
    public function render()
    {
        $items = Estimate::where([
            ['is_deleted', '=', 0],
        ])->get()->sortBy('is_graded');
        return view('livewire.estimates.estimate-index', compact('items'));
    }

    public function delete($id){
        $item=Estimate::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة التقدير");
    }

}
