@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="display-4 text-center custom_shadow">Our Applicants List</h1>
                @foreach($applicants as $applicant)
                <div class="card shadow">
                    <div class="card-header"><i class="fa fa-crosshairs" aria-hidden="true"></i> {{$applicant->title}}</div>
                    <div class="card-body">
                        <table class="table table_design">
                            <thead class="text-center">
                            <th><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Coverletter</th>
                            <th>Resume</th>
                            </thead>
                            @php $i = 0; @endphp
                            @foreach($applicant->users as $user)
                            <tbody>
                            <tr>
                                <th scope="row">[@php $i+=1;  echo $i; @endphp]</th>
                                <td>{{$user->profile->first_name}} {{$user->profile->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->phone}}</td>
                                <td class="text-center">

                                    @if(!empty($user->profile->cover_letter))
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">
                                            <button class="btn btn-light"><i class="fas fa-download"></i> Download CoverLetter</button>
                                        </a>
                                    @else
                                        <p class="text-center red">NULL</p>
                                    @endif
                                </td>
                                <td class="text-center">

                                    @if(!empty($user->profile->cover_letter))
                                        <a href="{{Storage::url($user->profile->resume)}}">
                                            <button class="btn btn-light"><i class="fas fa-download"></i> Download Resume</button>
                                        </a>
                                    @else
                                        <p class="text-center red">NULL</p>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                    <div class="my-2"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
