<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Reply;

class DiscussionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index', [
            'discussions' =>Discussion::filterByChannels()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create', [

            'discussions' => Discussion::paginate(5)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {

        // $user = User::get();

        auth()->user()->discussions()->create([

            'title' => $request->title,
            'slug' => ($request->title),
            'content' => $request->content,
            'channel_id' => $request->channel_id

        ]);

        session()->flash('success', 'Discussion Posted');

        return redirect()->route('discussion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show', [

            'discussion' => $discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);

        session()->flash('success', 'Marked as best reply');

        return redirect()->back();
    }
}
