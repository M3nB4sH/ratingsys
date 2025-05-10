<?php

namespace App\Livewire\Estimates;

use App\Models\Estimate;
use Livewire\Component;

class EstimateEdit extends Component
{
    public $estimate, $name, $grade, $is_graded;
    public function mount($id){
        $this->estimate = Estimate::find($id);
        $this->name = $this->estimate->name;
        $this->is_graded = $this->estimate->is_graded;
        $this->grade = $this->estimate->grade;
    }
    public function render()
    {
        return view('livewire.estimates.estimate-edit',['is_graded' => $this->is_graded]);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->estimate->name = $this->name;
        if($this->is_graded){
            $this->estimate->grade = $this->grade;
        }
        $this->estimate->save();
        return to_route(route: 'estimate.index')->with('success',value: 'تم تعديل التقدير');
    }
}
