@extends('template.visitor.master')

@section('title','Crete | Galery')

@section('content')

{{-- @dump($errors) --}}

{{-- when user is loggin
@dump(Auth::user()->name)
@dump(Auth::user()->id) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Tambah Galery Photo
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_galeri">Judul</label>
                <input type="text" name="nama_galeri" class="form-control" id="nama_galeri" placeholder="nama galeri"
                    value="{{ old('nama_galeri') }}">
            </div>
            <div class="form-group">
                <label for="id_album">Album</label>
                <select name="id_album" class="form-control" id="id_album">
                    @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan"
                    rows="3">{{ old('keterangan') }}</textarea>
            </div>
            <div class="form-group">
                <label for="upload-gambar">Upload Gambar</label>
                <input type="file" name="foto" class="form-control-file" id="upload-gambar" placeholder="upload file">
            </div>
            <div class=" text-right">
                <a href="/galeri" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection