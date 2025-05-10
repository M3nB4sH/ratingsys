<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Competence;
use App\Models\DirectorSignature;
use App\Models\Estimate;
use App\Models\Field;
use App\Models\Form;
use App\Models\ManagerSignature;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\TeacherSignature;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPdf\Facades\Pdf;

class RatingController extends Controller
{
    public function show($id){
        $rating = Rating::find($id);
        $data = json_decode($rating->data, true);
        $form = Form::find($rating->form_id);
        $options = json_decode($form->options, true);
        $allEstimates = Estimate::where("is_graded", 0)->get();
        $allEstimatesgraded = Estimate::where("is_graded", 1)->get();
        $allActivities = Activity::all();
        $allCompetences = Competence::all();
        $allFields = Field::all();
        $DAYS   =   array('الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');
        $dName      =   date("w",);
        $dName      =   date("w",strtotime($data["dayanddate"]));
        $data["day"] = $DAYS[$dName];
        $teacher = Teacher::find($rating->teacher_id);
        $teachersign = TeacherSignature::where("rating_id",$rating->id)->first();
        $managersign = ManagerSignature::where("rating_id",$rating->id)->first();
        $directorsign = DirectorSignature::where("rating_id",$rating->id)->first();
        $user = User::find(Auth::id());
        return view('rating.show', [

            'rating' => $rating,
            'data' => $data,
            'form'=> $form,
            'allEstimates' => $allEstimates,
            'allFields' => $allFields,
            'options' => $options,
            'allEstimatesgraded' => $allEstimatesgraded,
            'allActivities' => $allActivities,
            'teacher' => $teacher,
            'allCompetences' => $allCompetences,
            'teachersign'=> $teachersign,
            'managersign' => $managersign,
            'directorsign' => $directorsign,
            'user' => $user,

        ]);
    }
    public function pdf($id){
        $rating = Rating::find($id);
        $data = json_decode($rating->data, true);
        $form = Form::find($rating->form_id);
        $options = json_decode($form->options, true);
        $allEstimates = Estimate::where("is_graded", 0)->get();
        $allEstimatesgraded = Estimate::where("is_graded", 1)->get();
        $allActivities = Activity::all();
        $allCompetences = Competence::all();
        $allFields = Field::all();
        $DAYS   =   array('الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');
        $dName      =   date("w",);
        $dName      =   date("w",strtotime($data["dayanddate"]));
        $data["day"] = $DAYS[$dName];
        $teacher = Teacher::find($rating->teacher_id);
        $teachersign = TeacherSignature::where("rating_id",$rating->id)->first();
        $managersign = ManagerSignature::where("rating_id",$rating->id)->first();
        $directorsign = DirectorSignature::where("rating_id",$rating->id)->first();
        $user = User::find(Auth::id());
        $pdfName =$form->name .'-'.$teacher->name ;
        return Pdf::view('rating.show', [

            'rating' => $rating,
            'data' => $data,
            'form'=> $form,
            'allEstimates' => $allEstimates,
            'allFields' => $allFields,
            'options' => $options,
            'allEstimatesgraded' => $allEstimatesgraded,
            'allActivities' => $allActivities,
            'teacher' => $teacher,
            'allCompetences' => $allCompetences,
            'teachersign'=> $teachersign,
            'managersign' => $managersign,
            'directorsign' => $directorsign,
            'user' => $user,

        ])
            ->format('a4')
            ->name($pdfName);
    }
}
