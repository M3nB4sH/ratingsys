<?php

namespace App\Livewire\Periods;

use App\Models\Period;
use Livewire\Component;

class PeriodIndex extends Component
{
    public function render()
    {
        $items = Period::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.periods.period-index', compact('items'));
    }

    public function delete($id){
        $item=Period::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة الفتره");
    }

}
