<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

/**
 * Class RepliesController
 * @package App\Http\Controllers
 */
class RepliesController extends Controller
{
    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store reply.
     *
     * @param Thread $thread
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Thread $thread)
    {
        $thread->addReply([
            'body'    => request('body'),
            'user_id' => auth()->id,
        ]);

        return redirect($thread->path());
    }
}
