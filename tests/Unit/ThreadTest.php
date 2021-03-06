<?php

namespace Tests\Unit;

use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ThreadTest
 * @package Tests\Unit
 */
class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    private $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_reply()
    {
        $this->thread->addReply([
            'body'    => 'FooBar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
