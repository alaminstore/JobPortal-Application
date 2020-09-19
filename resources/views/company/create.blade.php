@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 applicant_photo">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('images/logo.png')}}"  class="img-fluid" alt="Applicant Photo">
                @else
                    <img
                        src="{{asset('upload/avatar')}}/{{Auth::user()->company->logo}}"
                        class="img-fluid" alt="Company logo">
                @endif
                <div class="col-md-12 text-center">
                    <div class="row">
                        <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header text-center">Change Company Logo</div>
                                <div class="card-body text-center">
                                    <input type="file" accept=".png, .jpg, .jpeg" name="logo" class="form-control"><br>
                                    <button class="btn btn-info btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                        {{--validation--}}
                        @if( $errors->has('logo'))
                            <div class="error red">
                                {{$errors->first('logo')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your info</div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" class="form-control" rows="3">

                                </textarea>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('address'))
                                <div class="error red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input name="phone" id="phone" value="" placeholder="017xxxxxxxx" class="form-control"/>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('phone'))
                                <div class="error red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="website">Website</label>
                                <input name="website" id="phone" value="" placeholder="www...." class="form-control"/>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('website'))
                                <div class="error red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="slogan">Goal</label>
                                <input name="slogan" id="phone" value="" class="form-control"/>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('slogan'))
                                <div class="error red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" class="form-control" rows="3">

                                </textarea>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('description'))
                                <div class="error red">
                                    {{$errors->first('description')}}
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
                    <div class="card-header text-center">Company Details</div>
                    <div class="card-body">
                        <p><b>Company Name:</b> {{Auth::user()->company->cname}}</p>
                        <p><b>Company Email:</b> {{Auth::user()->email}}</p>
                        <p><b>Website:</b> {{Auth::user()->company->website}}</p>
                        <p><b>Phone</b> {{Auth::user()->company->phone}}</p>
                        <p><b>Description:</b> {{Auth::user()->company->description}}</p>
                        <p><b>Objective:</b> {{Auth::user()->company->slogan}}</p>
                    </div>
                </div>
                <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Cover Photo</div>
                        <div class="card-body text-center">
                            <input type="file" accept=".png, .jpg, .jpeg" name="cover_photo" class="form-control"><br>
                            <button class="btn btn-info btn-sm">Update</button>
                        </div>
                    </div>
                </form>
                {{--validation--}}
                @if( $errors->has('cover_photo'))
                    <div class="error red">
                        {{$errors->first('cover_photo')}}
                    </div>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection
