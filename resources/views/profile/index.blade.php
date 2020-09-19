@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 applicant_photo">
                <img src="{{asset('images/applicant.png')}}" class="img-fluid" alt="Applicant Photo">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update your info</div>
                        <div class="card-body">
                            <form action="{{route('profile.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="dob">Date of birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="gender"><b> Gender </b></label> &nbsp;
                                    <input type="radio" value="male" name="gender"> &nbsp; Male&nbsp;
                                    <input type="radio" value="female" name="gender"> &nbsp; Female&nbsp;
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="bio">Biodata</label>
                                    <textarea name="bio" id="" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success">Submit</button>
                                </div>
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Applicant Description</div>
                    <div class="card-body">
                        <h4 class="text-center">Applicant Details</h4>
                        <p><b>Full Name: </b>
                            {{Auth::user()->profile->first_name}}
                            {{Auth::user()->profile->last_name}}
                        </p>
                        <p><b>Email: </b> {{Auth::user()->email}} </p>
                        <p><b>Address: </b> {{Auth::user()->profile->address}} </p>
                        <p><b>Biodata: </b> {{Auth::user()->profile->bio}} </p>
                        <p><b>Member Since: </b> {{Auth::user()->profile->created_at}} </p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                <button class="btn btn-light"><i class="fas fa-download"></i> Cover Letter</button>
                            </a>
                        @else
                            <p class="text-center alert alert-warning">Please upload  your cover letter</p>
                        @endif
                        &nbsp;
                        @if(!empty(Auth::user()->profile->resume))
                            <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                                <button class="btn btn-light"><i class="fas fa-download"></i> Remuse</button>
                            </a>
                        @else
                            <p class="text-center alert alert-warning">Please upload  your Resume</p>
                        @endif
                    </div>
                </div>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Update your cover letter</div>
                        <div class="card-body text-center">
                            <input type="file" accept=".doc,.docx,.pdf" name="cover_letter" class="form-control"><br>
                            <button class="btn btn-info btn-sm">Update</button>
                        </div>
                    </div>
                </form>

                <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Update your Resume</div>
                        <div class="card-body text-center">
                            <input type="file" accept=".doc,.docx,.pdf" name="resume" class="form-control"><br>
                            <button class="btn btn-info btn-sm">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </div>
@endsection
