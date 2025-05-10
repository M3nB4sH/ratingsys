<?php

namespace App\Livewire\Forms;

use App\Models\Form;
use Livewire\Component;

class FormIndex extends Component
{
    public function render()
    {
        $items = Form::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-index', compact('items'));
    }

    public function delete($id){
        $item=Form::find($id);
        $item->is_deleted = 1;
        $item->save();
        session()->flash("success",value: "تم ازالة التقويم");
    }
}
