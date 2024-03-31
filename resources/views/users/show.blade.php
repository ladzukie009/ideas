@extends('layouts.layout')

@section('content')
<div class="col-3">
    @include('shared.sidebar')
</div>
<div class="col-6">
    @include('shared.success-message')
    <div class="mt-3">
        @include('shared.user-card')
    </div>
    <hr>

    @forelse ($ideas as $idea)
        <div class="mt-3">
            @include('shared.idea-card')
        </div>
    @empty
        <p class="text-center mt-4">No results found.</p>
    @endforelse

    <div class="mt-3">
        {{$ideas->withQueryString()->links()}}
    </div>

</div>
<div class="col-3">
    @include('shared.search-bar')
    @include('shared.follow-box')
    <div class="card">
        <div class="card-header pb-0 border-0">
            <h5 class="">Search</h5>
        </div>
        <div class="card-body">
            <input placeholder="...
            " class="form-control w-100" type="text"
                id="search">
            <button class="btn btn-dark mt-2"> Search</button>
        </div>
</div>
@endsection
