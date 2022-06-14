@extends('layouts.app')
{{-- @extends('errors.msg') --}}

@section('content')


<div class="card">
    {{-- <h2>{{ $errors->getMessage() }}</h2> --}}

    <div class="card-header">Add Discussion</div>

    <div class="card-body">
@include('errors.msg')
        <form action="{{route('discussion.store')}}" method="POST">
            @csrf
            <div class="form-group">

                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="">

            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif
            </div>

            <div class="form-group">

                <label for="title">Content</label>

                <input id="content" type="hidden" name="content" >

                <trix-editor input="content"></trix-editor>

                @if($errors->has('content'))
                <div class="error">{{ $errors->first('content') }}</div>
            @endif
            </div>

            <div class="form-group">

                <label for="title">Channel</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3 ">
               Create Discussion
            </button>
        </form>

    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"></script>
@endsection
