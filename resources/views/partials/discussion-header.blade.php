<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->user->email)}}" alt="">
                <span class="ml-5 font-weight-bold">{{$discussion->user->name}}</span>
        </div>
        <a href="{{route('discussion.show', $discussion->slug)}}" class="btn btn-success btn-sm">View</a>
    </div>
</div>
