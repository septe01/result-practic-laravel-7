{{-- @dump($album->nama_album) --}}
@extends('template.visitor.master')

@section('title','Edit | Galeri')

@section('content')

{{-- @dump($errors) --}}

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Edit Album
        {{-- <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah album</a> --}}
    </div>
    <div class="table-responsive p-4">
        <form action="{{ route('galeri.update',$galeries->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_galeri">Judul</label>
                <input type="text" name="nama_galeri" class="form-control" id="nama_galeri" placeholder="nama galeri"
                    value="{{ $galeries->nama_galeri }}">
            </div>
            <div class="form-group">
                <label for="id_album">Album</label>
                <select name="id_album" class="form-control" id="id_album">
                    @foreach ($albums as $album)
                    <option value="{{ $album->id }}" @if ($album->id === $galeries->id_album)
                        selected
                        @endif
                        >{{ $album->nama_album }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan"
                    rows="3">{{ $galeries->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <label for="upload-gambar">Gambar</label>
                <img src="{{ asset('assets/thumb/'.$galeries->foto) }}" alt="..." class="img-thumbnail d-block"
                    style="width:100px">

            </div>

            <div class="form-group">
                <label for="upload-gambar">Ganti gambar</label>
                <input type="file" name="foto" class="form-control-file" id="upload-gambar" placeholder="upload file">
                <label>:( Jika gambar tidak mau di ganti kosongkan saja</label>
            </div>
            <div class=" text-right">
                <a href="{{ route('galeri') }}" type="submit" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection