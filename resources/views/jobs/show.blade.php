@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $job->title }}</div>

                    <div class="card-body">
                       <p>
                           <h3>Description</h3>
                           {{$job->description}}
                       </p>
                        <p>
                            <h3>Rules</h3>
                            {{$job->description}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Information</div>
                    <div class="card-body">
                        <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                            <p>Company: {{$job->company->cname}}</p>
                        </a>
                        <p>Address: {{$job->address}}</p>
                        <p>Job Position: {{$job->position}}</p>
                        <p>DeadLine: {{$job->last_date}}</p>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>  {{Session::get('message')}}
                        </div>
                    @endif


                    @if(Auth::check() && Auth::user()->user_type=='seeker')
                        @if(!$job->checkApply())
                            <form action="{{route('jobs.apply',[$job->id] )}}" method="post">
                                @csrf
                                <button class="btn btn-secondary  btn-block btn-sm">Apply The Job</button>
                            </form>
                        @else
                            <p class=" text-center alert alert-"><b>Applied</b></p>
                        @endif
                    @else
                        <p class=" text-center alert alert-warning"><b>Login to apply</b></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
{{--auth()->user()->id--}}
