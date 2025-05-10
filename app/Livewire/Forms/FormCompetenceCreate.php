<?php

namespace App\Livewire\Forms;

use App\Enums\Formtype;
use App\Models\Competence;
use App\Models\Form;
use Livewire\Component;

class FormCompetenceCreate extends Component
{
    public $name, $type, $options, $dayanddate,$teachername, $level, $childrencount, $eduexp, $week, $filmname, $note, $recommendations;
    public $competences = [];

    public function render()
    {
        $allCompetences = Competence::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-competence-create', compact('allCompetences'));
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'competences' => 'required',
            'dayanddate' => 'required',
            'level' => 'required',
            'childrencount' => 'required',
            'eduexp' => 'required',
            'week' => 'required',
            'teachername' => 'required',
            'filmname' => 'required',
            'note' => 'required',
            'recommendations' => 'required',
        ]);
        $arr = [
            'competences' => $this->competences,
            'dayanddate' => $this->dayanddate,
            'level' => $this->level,
            'childrencount' => $this->childrencount,
            'eduexp' => $this->eduexp,
            'week' => $this->week,
            'teachername' => $this->teachername,
            'filmname' => $this->filmname,
            'note' => $this->note,
            'recommendations' => $this->recommendations];
        $options = json_encode($arr);

        Form::create([
            'name'=> $this->name,
            'type' => Formtype::Competence,
            'options'=> $options,
        ]);
        return to_route(route: 'form.index')->with('success','تم اضافة تقويم الكفايات');
    }
}
