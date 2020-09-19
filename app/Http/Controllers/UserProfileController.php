<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function store(Request $request){
        $this->validate($request,[
           'dob'=>'required',
           'gender'=>'required',
           'address'=>'required',
           'phone'=>'required|regex:/(01)[0-9](9)/',
           'bio'=>'required|min:20',
           'experience'=>'required',
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'dob'=>request('dob'),
            'gender'=>request('gender'),
            'address'=>request('address'),
            'phone'=>request('phone'),
            'bio'=>request('bio'),
            'experience'=>request('experience'),
        ]);
        return redirect()->back()->with('message','Profile updated successfully');
    }

    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,docx,doc|max:3072'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')
            ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover,
        ]);
        return redirect()->back()->with('message','Cover letter updated successfully');
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,docx,doc|max:3072'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')
            ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume,
        ]);
        return redirect()->back()->with('message','Your resume updated successfully');
    }


    public function avatar(Request $request){
        $this->validate($request,[
            'avatar' =>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('upload/avatar',$filename);
            Profile::where('user_id',$user_id)->update([
                'avatar' =>$filename,
            ]);

            return redirect()->back()->with('message','Profile Photo Updated');
        }
    }
}
