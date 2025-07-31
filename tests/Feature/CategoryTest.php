<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function a_category_can_be_created()
    {
        $categoryData = [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
        ];

        $post = Category::create($categoryData);

        $this->assertDatabaseHas('categories', $categoryData);
    }
}
