@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 applicant_photo">
                @if(empty(Auth::user()->profile->avatar))
                    <img src="{{asset('images/applicant.png')}}"  class="img-fluid" alt="Applicant Photo">
                @else
                    <img
                        src="{{asset('upload/avatar')}}/{{Auth::user()->profile->avatar}}"
                        class="img-fluid" alt="Applicant Photo">
                @endif
                <div class="col-md-12 text-center">
                    <div class="row">
                        <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header text-center">Change your Photo</div>
                                <div class="card-body text-center">
                                    <input type="file" accept=".png, .jpg, .jpeg" name="avatar" class="form-control"><br>
                                    <button class="btn btn-info btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your info</div>
                        <div class="card-body">
                            <form action="{{route('profile.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="dob">Date of birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                                {{--validation--}}
                                @if( $errors->has('dob'))
                                    <div class="error red">
                                        {{$errors->first('dob')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="gender"><b> Gender </b></label> &nbsp;
                                    <input type="radio" value="male" name="gender"> &nbsp; Male&nbsp;
                                    <input type="radio" value="female" name="gender"> &nbsp; Female&nbsp;
                                </div>
                                {{--validation--}}
                                @if( $errors->has('gender'))
                                    <div class="error red">
                                        {{$errors->first('gender')}}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" class="form-control" rows="3">{{Auth::user()->profile->address}}
                                    </textarea>
                                </div>

                               {{--validation--}}
                                @if( $errors->has('address'))
                                    <div class="error red">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="bio">Objective</label>
                                    <textarea name="bio" id="" cols="30" class="form-control" rows="3">{{Auth::user()->profile->bio}}</textarea>
                                </div>
                                {{--validation--}}
                                @if( $errors->has('bio'))
                                    <div class="error red">
                                        {{$errors->first('bio')}}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <button class="btn btn-success btn-block btn-sm">Update</button>
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
                        <p><b>Member Since: </b> {{date('F d Y',strtotime(Auth::user()->profile->created_at))}} </p>
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
                {{--validation--}}
                @if( $errors->has('cover_letter'))
                    <div class="error red">
                        {{$errors->first('cover_letter')}}
                    </div>
                @endif

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
                {{--validation--}}
                @if( $errors->has('resume'))
                    <div class="error red">
                        {{$errors->first('resume')}}
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
@endsection
