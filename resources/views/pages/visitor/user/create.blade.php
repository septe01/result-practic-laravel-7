@extends('template.visitor.master')

@section('title','Crete | User')

@section('content')

{{-- @dump($errors) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Tambah User
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama User</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="username"
                    value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="yourname@company.com"
                    value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="Admin" value="Admin">
                        <label class="form-check-label" for="Admin">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="Operator" value="Operator">
                        <label class="form-check-label" for="Operator">Operator</label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="********"
                    value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                    placeholder="********" value="{{ old('password_confirmation') }}">
            </div>


            <div class=" text-right">
                <a href="/user" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection