@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h3 class="text text-dark mb-5">
            Add User
        </h3>
        @if ($errors->any())
            <div class="container alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('adminusers.store')}}" method="POST" >
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label fw-bold">User Name</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="name"  name="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label fw-bold">User email</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="email"  name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label fw-bold">password</label>
                <div class="col-sm-10">
                    <input type="password"  class="form-control" id="password"  name="password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password_confirmation" class="col-sm-2 col-form-label fw-bold">Confirm password</label>
                <div class="col-sm-10">
                    <input type="password"  class="form-control" id="password_confirmation"  name="password_confirmation">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_admin" class="col-sm-2 col-form-label fw-bold">User Role</label>
                <div class="col-sm-10">
                    <select name="is_admin" class="form-select" aria-label="Default select example" id="is_admin">
                        <option></option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-4" style="width: 450px; position: relative; left: 35%">
                Create
            </button>

        </form>
    </div>
@endsection
