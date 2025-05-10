<?php

namespace App\Livewire\Estimates;

use App\Models\Estimate;
use Livewire\Component;

class EstimateCreate extends Component
{
    public $name, $grade;

    public function render()
    {
        return view('livewire.estimates.estimate-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'grade' => 'integer|nullable',
        ]);
        if ($this->grade > 0) {
            Estimate::create([
                'name'=> $this->name,
                'grade'=> $this->grade,
                'is_graded' => 1,
            ]);
        }else{
            Estimate::create([
                'name'=> $this->name,
            ]);
        }

        return to_route(route: 'estimate.index')->with('success','تم اضافة التقدير');
    }

}
