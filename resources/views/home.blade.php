{{-- @extends('layouts.app') --}}

@extends('template.visitor.master')

@section('title','Home')

@section('content')
<div class=" justify-content-center w-100 mt-3">
    <div class="card w-100">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            {{ __('You are logged in!') }}
        </div>
    </div>
</div>
@endsection