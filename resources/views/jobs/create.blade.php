@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> {{ __('Job Post') }}</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>  {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{ route('jobs.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Job title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            {{--validation--}}
                            @if( $errors->has('title'))
                                <div class="error red">
                                    {{$errors->first('title')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('description'))
                                <div class="error red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>
                            {{--validation--}}
                            @if( $errors->has('position'))
                                <div class="error red">
                                    {{$errors->first('position')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control">
                                    @foreach(App\Models\Categoty::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                            </div>
                            {{--validation--}}
                            @if( $errors->has('address'))
                                <div class="error red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="type">Job Type</label>
                                <select name="type" class="form-control">
                                    <option value="fulltime" >Full Time</option>
                                    <option value="parttime">Part Time</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="live" selected>Live</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="last_date">Apply Deadline</label>
                                <input type="date" name="last_date" class="form-control">
                            </div>
                            {{--validation--}}
                            @if( $errors->has('last_date'))
                                <div class="error red">
                                    {{$errors->first('last_date')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block btn-sm"> <i class="fa fa-share-square" aria-hidden="true"></i> Submit The Job</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
