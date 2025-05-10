<?php

namespace App\Livewire\Weeks;

use App\Models\Week;
use Livewire\Component;

class WeekEdit extends Component
{
    public $week, $name;
    public function mount($id){
        $this->week = Week::find($id);
        $this->name = $this->week->name;
    }

    public function render()
    {
        return view('livewire.weeks.week-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->week->name = $this->name;
        $this->week->save();
        return to_route(route: 'week.index')->with('success',value: 'تم تعديل الاسبوع');
    }

}
