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
                        <p>Company: {{$job->company->cname}}</p>
                        <p>Address: {{$job->address}}</p>
                        <p>Job Position: {{$job->position}}</p>
                        <p>DeadLine: {{$job->last_date}}</p>
                    </div>
                    @if(Auth::check())
                    <button class="btn btn-secondary  btn-block btn-sm">Apply The Job</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
