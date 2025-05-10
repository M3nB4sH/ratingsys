<?php

namespace App\Http\Controllers;

use App\Models\DirectorSignature;
use App\Models\ManagerSignature;
use App\Models\Rating;
use App\Models\TeacherSignature;
use App\Models\User;
use Creagia\LaravelSignPad\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SignRatingController extends Controller
{
    public function teachercreate(Rating $rating)
    {
        $sign = TeacherSignature::where([['teacher_sign', '=', 1],['rating_id', '=', $rating->id]])->get();
        if ( !$sign->count() )
            {
                return view('signature.teachersign', compact('rating'));
            }
            return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');

    }
    public function teacherstore(Request $request)
    {
        $validatedData = $request->validate([
            'sign' => 'required',
        ]);
        $sign = TeacherSignature::where([['teacher_sign', '=', 1],['rating_id', '=', $request->rating_id]])->get();
        if ( $sign->count() )
            {
                return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');
            }
        $signature = new Signature();

        $signRating = TeacherSignature::create([
            'teacher_sign' => 1,
            'rating_id' => $request->rating_id
        ]);
        $signature->model_id = $signRating->id;
        $signatureData = str_replace('data:image/png;base64,', '', $validatedData['sign']);
        $signatureData = base64_decode($signatureData);
        $imageName = 'signatures/' . Str::uuid() . '.png';
        Storage::disk('public')->put($imageName, $signatureData);
        $signature->model_type = TeacherSignature::class;
        $signature->uuid = Str::uuid();
        $signature->filename = $imageName;
        $signature->document_filename = null;
        $signature->certified = false;
        $signature->from_ips = json_encode([request()->ip()]);
        $signature->save();
        // Redirect back with success message.
        return to_route('signature.thanks')->with('success','تم إضافة التوقيع الرقمي بنجاح');
    }
    public function managercreate(Rating $rating)
    {
        $sign = ManagerSignature::where([['manager_sign', '=', 1],['rating_id', '=', $rating->id]])->get();
        if ( !$sign->count() )
            {
                return view('signature.managersign', compact('rating'));
            }
            return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');

    }
    public function managerstore(Request $request)
    {
        $validatedData = $request->validate([
            'sign' => 'required',
        ]);
        $sign = ManagerSignature::where([['manager_sign', '=', 1],['rating_id', '=', $request->rating_id]])->get();
        if ( $sign->count() )
            {
                return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');
            }
        $signature = new Signature();
        $signRating = ManagerSignature::create([
            'manager_sign' => 1,
            'rating_id' => $request->rating_id
        ]);
        $signature->model_id = $signRating->id;

        $signatureData = str_replace('data:image/png;base64,', '', $validatedData['sign']);
        $signatureData = base64_decode($signatureData);
        $imageName = 'signatures/' . Str::uuid() . '.png';
        Storage::disk('public')->put($imageName, $signatureData);
        $signature->model_type = ManagerSignature::class;

        $signature->uuid = Str::uuid();
        $signature->filename = $imageName;
        $signature->document_filename = null;
        $signature->certified = false;
        $signature->from_ips = json_encode([request()->ip()]);
        $signature->save();
        // Redirect back with success message.
        return to_route('signature.thanks')->with('success','تم إضافة التوقيع الرقمي بنجاح');
    }
    public function directorcreate(Rating $rating)
    {
        $sign = DirectorSignature::where([['director_sign', '=', 1],['rating_id', '=', $rating->id]])->get();
        if ( !$sign->count() )
            {
                return view('signature.directorsign', compact('rating'));
            }
            return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');

    }
    public function directorstore(Request $request)
    {
        $validatedData = $request->validate([
            'sign' => 'required',
        ]);
        $sign = DirectorSignature::where([['director_sign', '=', 1],['rating_id', '=', $request->rating_id]])->get();
        if ( $sign->count() )
            {
                return to_route('signature.thanks')->with('danger','لايمكن التوقيع مرة اخرى');
            }
        $signature = new Signature();
        $signRating = DirectorSignature::create([
            'director_sign' => 1,
            'rating_id' => $request->rating_id
        ]);
        $signature->model_id = $signRating->id;

        $signatureData = str_replace('data:image/png;base64,', '', $validatedData['sign']);
        $signatureData = base64_decode($signatureData);
        $imageName = 'signatures/' . Str::uuid() . '.png';
        Storage::disk('public')->put($imageName, $signatureData);
        $signature->model_type = DirectorSignature::class;
        $signature->uuid = Str::uuid();
        $signature->filename = $imageName;
        $signature->document_filename = null;
        $signature->certified = false;
        $signature->from_ips = json_encode([request()->ip()]);
        $signature->save();
        // Redirect back with success message.
        return to_route('signature.thanks')->with('success','تم إضافة التوقيع الرقمي بنجاح');
    }
}
