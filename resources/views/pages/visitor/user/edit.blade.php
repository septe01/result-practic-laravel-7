@extends('template.visitor.master')

@section('title','Edit | User')

@section('content')

{{-- @dump($errors) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Edit User
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama User</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="username"
                    value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="yourname@company.com"
                    value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="Admin" value="Admin"
                            @if($user->level === "Admin")
                        checked
                        @endif>
                        <label class="form-check-label" for="Admin">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="Operator" value="Operator"
                            value="Admin" @if($user->level === "Operator")
                        checked @endif>
                        <label class="form-check-label" for="Operator">Operator</label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="********"
                    value="{{ old('password') }}">
                <small id="info" class="form-text text-muted">
                    :( jika tidak ganti password boleh dikosongkan
                </small>
            </div>


            <div class=" text-right">
                <a href="/user" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection