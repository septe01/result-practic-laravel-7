@extends('template.visitor.master')

@section('title','Album')

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
        Data Album
        <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a>
    </div>
    <div class="table-responsive p-4">
        <table class="table table-hover p-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama album</th>
                    <th scope="col">Url SEO</th>
                    <th scope="col">Gambar</th>
                    <th scope="col" class=" text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @if (count($albums) !== 0)
                @foreach ($albums as $album)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $album->nama_album }}</td>
                    <td>{{ $album->album_seo }}</td>
                    <td>
                        <img src="{{ asset('assets/images/'.$album->gambar) }}" alt="..." class="img-thumbnail"
                            style="width:100px">
                    </td>
                    <td class=" text-right">
                        <form action="{{ route('album.delete',$album->id) }}" method="POST">
                            @csrf
                            <button class=" btn btn-danger" type="submit"
                                onclick="return confirm('yakin mau hapus ini!')">Hapus</button>
                            <a class=" btn btn-primary" href="{{ route('album.edit',$album->id) }}">Edit</a>
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
    </div>
</div>

@endsection