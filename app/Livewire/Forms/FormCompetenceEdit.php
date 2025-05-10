<?php

namespace App\Livewire\Forms;

use App\Models\Competence;
use App\Models\Form;
use Livewire\Component;

class FormCompetenceEdit extends Component
{
    public $form, $name, $type, $options, $dayanddate,$teachername, $level, $childrencount, $eduexp, $week, $filmname, $note, $recommendations;
    public $competences = [];

    public $allCompetences;
    public function mount($id){
        $this->form = Form::find($id);
        $this->name = $this->form->name;
        $aray =json_decode($this->form->options);
        $this->competences = $aray->competences;
        $this->dayanddate = $aray->dayanddate;
        $this->level = $aray->level;
        $this->childrencount = $aray->childrencount;
        $this->eduexp = $aray->eduexp;
        $this->week = $aray->week;
        $this->teachername = $aray->teachername;
        $this->filmname = $aray->filmname;
        $this->note = $aray->note;
        $this->recommendations = $aray->recommendations;
        $this->allCompetences = Competence::where([
            ['is_deleted', '=', 0],
        ])->get();
    }

    public function render()
    {
        $allCompetences = Competence::where([
            ['is_deleted', '=', 0],
        ])->get();
        return view('livewire.forms.form-competence-edit', compact('allCompetences'));
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

        $this->form->name = $this->name;
        $this->form->options = $options;
        $this->form->save();
        return to_route(route: 'form.index')->with('success','تم تعديل تقويم الكفايات');
    }

}
