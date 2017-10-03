<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reply
 * @package App
 */
class Reply extends Model
{
    protected $fillable = [
        'user_id',
        'thread_id',
        'body',
    ];

    /**
     * Owner.
     */
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
