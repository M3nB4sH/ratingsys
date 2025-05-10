<?php

namespace App\Livewire\Levels;

use App\Models\Level;
use Livewire\Component;

class LevelCreate extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.levels.level-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Level::create([
            'name'=> $this->name,
        ]);
        return to_route(route: 'level.index')->with('success','تم اضافة المستوى');
    }
}
