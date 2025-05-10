<?php

namespace App\Http\Controllers;

use App\Models\User;
use Creagia\LaravelSignPad\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SignController extends Controller
{
    public function create()
    {
        if (User::find(Auth::id())->signature){
            return to_route('dashboard')->with('danger','لديك توقيع رقمي، لا يمكن إضافة توقيع أخر');
        }
        return view('signature.sign');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sign' => 'required',
        ]);
        $user = User::find(Auth::id());
        $signatureData = str_replace('data:image/png;base64,', '', $validatedData['sign']);
        $signatureData = base64_decode($signatureData);
        $imageName = 'signatures/' . Str::uuid() . '.png';
        Storage::disk('public')->put($imageName, $signatureData);
        $signature = new Signature();
        $signature->model_type = User::class;
        $signature->model_id = $user->id;
        $signature->uuid = Str::uuid();
        $signature->filename = $imageName;
        $signature->document_filename = null;
        $signature->certified = false;
        $signature->from_ips = json_encode([request()->ip()]);
        $signature->save();
        // Redirect back with success message.
        return to_route('dashboard')->with('success','تم إضافة التوقيع الرقمي بنجاح');
    }
}
