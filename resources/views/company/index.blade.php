@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cover-photo">
            <img src="{{asset('images/banner.jpg')}}" class="img-fluid cover_photo" alt="Cover Photo">
            <div class="comlogo">
                <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="Company Logo">
            </div>
        </div>
        <div class="clr"></div>
        <br><br><br>
        <div class="row card">
            <div class="card-body">
                <div class="company-desc">
                    <h1><b>Conmapy Name:</b> {{$company->cname}}</h1>
                    <p>{{$company->description}}</p>
                    <p><b>Objective:</b> {{$company->slogan}}</p>
                    <p><b>Address:</b> {{$company->address}}</p>
                    <p><b>Website:</b> {{$company->website}}</p>
                    <p><b>Phone:</b> + {{$company->phone}}</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h3>Posted Job List</h3>
            <table class="table">
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
                @foreach($company->Job as $job)
                    <tr>
                        <th scope="row">@php $i+=1;  echo $i; @endphp </th>
                        <td class="logoimage"><img src="{{asset('images/logo.png')}}" class="img-fluid"ss alt=""></td>
                        <td>{{$job->position}} <br>Job Type: {{$job->type}}</td>
                        <td>{{$job->address}}</td>
                        <td>{{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success btn-sm"> Apply Here</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
