<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostsTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_posts()
    {

        $post = Post::find(1);
        $this->assertTrue(true);
    }
}
