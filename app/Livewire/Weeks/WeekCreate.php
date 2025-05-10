<?php

namespace App\Livewire\Weeks;

use App\Models\Week;
use Livewire\Component;

class WeekCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.weeks.week-create');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Week::create([
            'name'=> $this->name,
        ]);
        return to_route(route: 'week.index')->with('success','تم اضافة الاسبوع');
    }

}
