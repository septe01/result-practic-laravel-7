@extends('template.visitor.master')

@section('title','Crete | Album')

@section('content')

{{-- @dump($errors) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Tambah Album
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputAddress">Nama Album</label>
                <input type="text" name="nama_album" class="form-control" id="inputAddress" placeholder="nama album"
                    value="{{ old('nama_album') }}">
            </div>
            <div class="form-group">
                <label for="upload-gambar">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control-file" id="upload-gambar" placeholder="upload file">
            </div>
            <div class=" text-right">
                <a href="{{ route('album') }}" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection