@extends('template.visitor.master')

@section('title','Galeri+')

@section('content')
<div class=" justify-content-center w-100 mt-3">
    <div class="card w-100">
        <div class="card-header">
            <h2 class="text-center my-2">Album: {{ ucwords($album->nama_album) }}</h2>
        </div>
        {{-- @dump(session('status')) --}}
        <div class="row">
            {{-- @dump($albums) --}}
            @if (count($galeries) !== 0)
            @foreach ($galeries as $galery)
            {{-- album', 'galeries --}}
            <div class="col-md-4 ">
                <div class="card-body ">
                    <a href="">
                        <div class="card shadow" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('assets/images/'.$galery->foto) }}"
                                alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $galery->nama_galeri }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="my-4 w-100 px-5 d-flex justify-content-end">
                {{ $galeries->links() }}
            </div>
            @else
            {{-- no data --}}
            @endif

        </div>
    </div>
</div>
@endsection