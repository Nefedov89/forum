<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Thread
 * @package App
 */
class Thread extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    /**
     * Path.
     */
    public function path()
    {
       return '/threads/' . $this->id;
    }

    /**
     * Replies.
     */
    public function replies()
    {
       return $this->hasMany(Reply::class);
    }

    /**
     * Creator.
     */
    public function creator()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Add reply.
     *
     * @param $reply
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
