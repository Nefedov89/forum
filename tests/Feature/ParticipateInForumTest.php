<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

/**
 * Class ParticipateInForumTest
 * @package Tests\Feature
 */
class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function unauthenticated_user_may_not_add_replies()
    {
        $this->expectException(AuthenticationException::class);
        $this->post('/threads/1/replies', []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        // Given authenticated user.
        $this->be($user = factory(User::class)->create());

        // Thread.
        $thread = factory(Thread::class)->create(['user_id' => $user->id]);

        // Reply.
        $reply = factory(Reply::class)->create(['thread_id' => $thread->id]);
        $this->post('/threads/'.$thread->id.'/replies', $reply->toArray());
        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
