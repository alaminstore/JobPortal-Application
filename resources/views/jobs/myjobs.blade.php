@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-list-ul" aria-hidden="true"></i> {{ __(' Our Company Posted Job List') }}</div>
                        <table class="table table-borderless table-responsive-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Position</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($jobs as $job)
                                <tr>
                                    <th scope="row">@php $i+=1;  echo '['.$i.']'; @endphp </th>
                                    <td class="logoimage"><img src="{{asset('images/logo.png')}}" class="img-fluid"ss alt=""></td>
                                    <td>{{$job->position}} <br>Job Type: {{$job->type}}</td>
                                    <td>{{$job->address}}</td>
                                    <td>{{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success btn-sm"> View Post</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
