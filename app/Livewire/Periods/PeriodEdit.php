<?php

namespace App\Livewire\Periods;

use App\Models\Period;
use Livewire\Component;

class PeriodEdit extends Component
{
    public $period, $name;
    public function mount($id){
        $this->period = Period::find($id);
        $this->name = $this->period->name;
    }
    public function render()
    {
        return view('livewire.periods.period-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->period->name = $this->name;
        $this->period->save();
        return to_route(route: 'period.index')->with('success',value: 'تم تعديل الفتره');
    }

}
