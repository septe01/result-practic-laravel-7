@extends('template.visitor.master')

@section('title','User')

@section('content')

@if (Session::has('pesan'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{-- @dump($albums) --}}
<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Data User
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah user</a>
    </div>
    <div class="table-responsive p-4">
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama user</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col" class=" text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dump($users) --}}
                @if (count($users) !== 0)
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->level }}
                    </td>
                    <td class=" text-right">
                        <form action="{{ route('user.delete',$user->id) }}" method="POST">
                            @csrf
                            <button class=" btn btn-danger" type="submit"
                                onclick="return confirm('yakin mau hapus ini!')">Hapus</button>
                            <a href="{{ route('user.edit',$user->id) }}" class=" btn btn-primary" href="">Edit</a>
                        </form>
                    </td>
                </tr>
                @endforeach

                @else
                <td colspan="5">
                    <div class="alert alert-danger text-center" role="alert">
                        No data album! ingin <a href="{{ route('user.create') }}" class="alert-link">Tambah user</a>.
                    </div>
                </td>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{-- {{ $galeries->links()  }} --}}
        </div>
    </div>
</div>

@endsection