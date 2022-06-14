<?php

namespace App\Models;

use App\Notifications\ReplyMarkedAsBestReply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getBestReply(Reply $reply)
    {
        return Reply::find($this->reply_id);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function scopeFilterByChannels($builder)
    {
        if(request()->query('channel'))
        {
           //filter
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel)
            {
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }

        return $builder;
    }


    public function markAsBestReply(Reply $reply)
    {
        $this->update([

            'reply_id' => $reply->id
        ]);

        if($reply->owner->id == $this->user->id)
            {
                return ;
            }

        $reply->owner->notify(new ReplyMarkedAsBestReply($reply->discussion));

    }


}

