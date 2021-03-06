<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class JobController extends Controller
{
    public function index(){
      //  $jobs = Job::all()->take(10);
        $jobs = Job::orderBy('id','desc')->take(10)->get();

        return view('welcome',compact('jobs'));
    }

    public function show($id,Job $job){
        return view('jobs.show',compact('job'));
    }
    public function create(){
        return view('jobs.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|min:20',
            'position'=>'required',
            'last_date'=>'required',
            'address'=>'required',
        ]);
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'category_id' => request('category'),
            'position' => request('position'),
            'status' => request('status'),
            'type' => request('type'),
            'last_date' => request('last_date'),
            'address' => request('address'),
        ]);
        return redirect()->back()->with('message','Job Posted successfully');
    }

    public function myjobs(){
        $user_id = auth()->user()->id;
        $jobs = Job::where('user_id',$user_id)
            ->orderBy('id', 'desc')   //asc order - also can use but desc by default
            ->get();
        return view('jobs.myjobs',compact('jobs'));
    }

    public function apply(Request $request,$id){
        $job_id = Job::find($id);
        $job_id->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','You applied successfully.');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id',Auth::user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }

}
