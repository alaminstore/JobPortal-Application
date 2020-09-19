<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function store(){
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'dob'=>request('dob'),
            'gender'=>request('gender'),
            'address'=>request('address'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->with('message','Profile updated successfully');
    }

    public function coverletter(Request $request){
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')
            ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover,
        ]);
        return redirect()->back()->with('message','Cover letter updated successfully');
    }

    public function resume(Request $request){
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')
            ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume,
        ]);
        return redirect()->back()->with('message','Your resume updated successfully');
    }
}
