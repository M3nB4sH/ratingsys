<?php

namespace App\Livewire\Fields;

use App\Models\Field;
use Livewire\Component;

class FieldIndex extends Component
{
    public function render()
    {
        $items = Field::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.fields.field-index',compact('items'));
    }

    public function delete($id){
        $item=Field::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة المجال");
    }
}
