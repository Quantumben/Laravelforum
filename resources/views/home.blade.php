@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">

    <a class="btn btn-success" href="{{route('discussion.create')}}">
    Add Discussion
    </a>

</div>

<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
        Dashboard
    </div>
</div>

@endsection
