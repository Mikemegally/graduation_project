@extends('layouts.admin')
@section('content')
    @if(session()->has('success'))
        <p class="container alert alert-success mt-3 text-center">
            {{session()->get('success')}}
        </p>
    @endif
    <div class="container card mb-3 mt-5" style="max-width: 90%;">
        <div class="row g-0">
            <div class="col-md-4 mt-3">
                <img src="{{asset('/storage/'. $admin->image)}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $admin->name}}</h5>
                    <p class="card-text">{{ $admin->description}}</p>
                    <a href="{{route('adminservice.index')}}" class="btn btn-secondary">
                        All Services Added
                    </a>
                    <a href="{{route('adminservice.edit',$admin->id)}}" class="btn btn-success">
                        Update Service
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
