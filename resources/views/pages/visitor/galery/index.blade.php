@extends('template.visitor.master')

@section('title','Galery')

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
        Data Galery
        <a href="{{ route('galeri.create') }}" class="btn btn-primary">Tambah galery</a>
    </div>
    <div class="table-responsive p-4">
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Album</th>
                    <th scope="col">Kontributor</th>
                    <th scope="col">Foto</th>
                    <th scope="col" class=" text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($galeries) !== 0)
                @foreach ($galeries as $galeri)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $galeri->nama_galeri }}</td>
                    <td>{{ $galeri->albums->nama_album }}</td>
                    <td>{{ $galeri->users->name }}</td>
                    <td>
                        <img src="{{ asset('assets/thumb/'.$galeri->foto) }}" alt="..." class="img-thumbnail"
                            style="width:100px">
                    </td>
                    <td class=" text-right">
                        <form action="{{ route('galeri.delete',$galeri->id) }}" method="POST">
                            @csrf
                            <button class=" btn btn-danger" type="submit"
                                onclick="return confirm('yakin mau hapus ini!')">Hapus</button>
                            <a href="{{ route('galeri.edit',$galeri->id) }}" class=" btn btn-primary" href="">Edit</a>
                        </form>
                    </td>
                </tr>
                @endforeach

                @else
                <td colspan="5">
                    <div class="alert alert-danger text-center" role="alert">
                        No data album! ingin <a href="{{ route('album.create') }}" class="alert-link">Tambah album</a>.
                    </div>
                </td>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $galeries->links()  }}
        </div>
    </div>
</div>

@endsection