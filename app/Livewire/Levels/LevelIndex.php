<?php

namespace App\Livewire\Levels;

use App\Models\Level;
use Livewire\Component;

class LevelIndex extends Component
{
    public function render()
    {
        $items = Level::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.levels.level-index',compact('items'));
    }
    public function delete($id){
        $item=Level::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة المستوى");
    }
}
