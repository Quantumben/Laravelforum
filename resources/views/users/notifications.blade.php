@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">

    <a class="btn btn-success" href="{{route('discussion.create')}}">
    Add Discussion
    </a>

</div>

<div class="card">
    <div class="card-header">Notifications</div>

    <div class="card-body">
      <ul class="list-group">

        @foreach ($notifications as $notification)

        <li class="list-group-item">
            @if($notification->type == 'App\Notifications\NewReplyAdded')
                A new reply was added to your discussion

                <strong>
                    {{ $notification->data['discussion']['title']}}
                </strong>

                <a href="{{ route('discussion.show', $notification->data['discussion']['slug'])}}" class="btn btn-sm btn-info float-right">
                    View Discussion
                </a>
            @endif

            @if ($notification->type == 'App\Notifications\ReplyMarkedAsBestReply')
                Your reply to the discussion <strong>{{ $notification->data['discussion']['title']}}
                </strong>
                was marked as best reply.

                <a href="{{ route('discussion.show', $notification->data['discussion']['slug'])}}" class="btn float-right btn-sm btn-info">
                    View Discussion
                </a>
            @endif

        </li>

        @endforeach
      </ul>
    </div>
</div>

@endsection
