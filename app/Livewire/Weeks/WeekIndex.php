<?php

namespace App\Livewire\Weeks;

use App\Models\Week;
use Livewire\Component;

class WeekIndex extends Component
{
    public function render()
    {
        $items = Week::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.weeks.week-index', compact('items'));
    }

    public function delete($id){
        $item=Week::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة الاسبوع");
    }

}
