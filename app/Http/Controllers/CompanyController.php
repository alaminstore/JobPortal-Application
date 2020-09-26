<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($id,Company $company){
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required',
            'website'=>'required',
            'slogan'=>'required',
            'description'=>'required|min:20',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);
        return redirect()->back()->with('message','Company Profile updated successfully');
    }

    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo' =>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('upload/cover',$filename);
            Company::where('user_id',$user_id)->update([
                'cover_photo' =>$filename,
            ]);

            return redirect()->back()->with('message','Company Cover Photo Updated');
        }
    }

    public function logo(Request $request){
        $this->validate($request,[
           'logo' =>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('upload/avatar',$filename);
            Company::where('user_id',$user_id)->update([
                'logo' =>$filename,
            ]);

            return redirect()->back()->with('message','Company Photo Updated');
        }
    }

}
