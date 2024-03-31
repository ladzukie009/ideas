@extends('layouts.layout')

@section('content')
<div class="col-3">
    @include('shared.sidebar')
</div>
<div class="col-6">
    @include('shared.success-message')
    @include('shared.submit-idea')
    <hr>
    <div class="mt-3">
        @if ($ideas->count() == 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                No result
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else
            @foreach ($ideas as $idea)
                @include('shared.idea-card')
            @endforeach
        @endif

        <div class="mt-3">
            {{$ideas->withQueryString()->links()}}
        </div>
    </div>
</div>
<div class="col-3">
    @include( 'shared.search-bar' )
    @include('shared.follow-box')
</div>
@endsection
