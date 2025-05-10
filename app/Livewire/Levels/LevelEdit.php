<?php

namespace App\Livewire\Levels;

use App\Models\Level;
use Livewire\Component;

class LevelEdit extends Component
{
    public $level, $name;

    public function mount($id){
        $this->level = Level::find($id);
        $this->name = $this->level->name;
    }
    public function render()
    {
        return view('livewire.levels.level-edit');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->level->name = $this->name;
        $this->level->save();
        return to_route(route: 'level.index')->with('success',value: 'تم تعديل المستوى');
    }
}
