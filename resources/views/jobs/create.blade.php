@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form action="{{route('jobs.store')}}" method="post">
                            <div class="form-group">
                                <label for="title">Job title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>
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
                            <div class="form-group">
                                <label for="type">Job Type</label>
                                <select name="type" class="form-control">
                                    <option value="fulltime">Full Time</option>
                                    <option value="parttime">Part Time</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="live">Live</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="last_date">Apply Deadline</label>
                                <input type="date" name="last_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-secondary btn-block btn-sm"> <i class="fa fa-share-square" aria-hidden="true"></i> Submit The Job</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
