@extends('template.visitor.master')

@section('title','Galeri+')

@section('content')
<div class=" justify-content-center w-100 mt-3">
    <div class="card w-100">
        <div class="card-header">
            <h2 class="text-center my-2">Album</h2>
        </div>
        {{-- @dump(session('status')) --}}
        <div class="row">
            {{-- @dump($albums) --}}
            @if (count($albums) !== 0)
            @foreach ($albums as $album)
            {{-- @dump($album) album_seo nama_album gambar  --}}
            <div class="col-md-4 ">
                <div class="card-body ">
                    <a href="{{ route('galery.photo',$album->album_seo) }}">
                        <div class="card shadow" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('assets/images/'.$album->gambar) }}"
                                alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $album->nama_album }}</h5>
                                <p class="card-text">{{ count($album->photos) }} Photos.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            {{-- no data --}}
            @endif

        </div>
    </div>
</div>
@endsection