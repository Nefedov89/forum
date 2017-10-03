<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ReplyTest
 * @package Tests\Unit
 */
class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_has_an_owner()
    {
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf(User::class, $reply->owner);
    }
}
