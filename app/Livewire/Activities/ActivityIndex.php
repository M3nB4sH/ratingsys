<?php

namespace App\Livewire\Activities;

use App\Models\Activity;
use Livewire\Component;

class ActivityIndex extends Component
{
    public function render()
    {
        $items = Activity::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.activities.activity-index', compact('items'));
    }
    public function delete($id){
        $item=Activity::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة النشاط");
    }
}
