{{-- @dump($album->nama_album) --}}
@extends('template.visitor.master')

@section('title','Edit | Album')

@section('content')

{{-- @dump($errors) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Edit Album
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputAddress">Nama Album</label>
                <input type="text" name="nama_album" class="form-control" id="inputAddress"
                    value="{{ $album->nama_album }}" placeholder="nama album">
            </div>
            <div class="form-group">
                <label for="upload-gambar">Gambar</label>
                <img src="{{ asset('assets/images/'.$album->gambar) }}" alt="..." class="img-thumbnail d-block"
                    style="width:100px">

            </div>
            <div class="form-group">
                <label for="upload-gambar">Ganti gambar</label>
                <input type="file" name="gambar" class="form-control-file" id="upload-gambar" placeholder="upload file">
                <label>:( Jika gambar tidak mau di ganti kosongkan saja</label>
            </div>
            <div class=" text-right">
                <a href="{{ route('album') }}" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection