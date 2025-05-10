<?php

namespace App\Livewire\Periods;

use App\Models\Period;
use Livewire\Component;

class PeriodCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.periods.period-create');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Period::create([
            'name'=> $this->name,
        ]);
        return to_route(route: 'period.index')->with('success','تم اضافة الفتره');
    }

}
