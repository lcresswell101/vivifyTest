<?php

namespace Tests\Feature\Posts;

use App\Livewire\Index;
use App\Livewire\Posts\PostUpdate;
use App\Models\Post;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostUpdateTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_renders_correctly() {
        $post = Post::factory()->create();

        Livewire::test(PostUpdate::class, [
            'post' => $post,
        ])
            ->assertStatus(200);
    }

    public function test_see_component() {
        $post = Post::factory()->create();

        $this->get(route('posts.update', [
            'post' => $post,
        ]))
            ->assertSeeLivewire(PostUpdate::class);
    }

    public function test_updates_post() {
        $post = Post::factory()->create();

        $title = $this->faker->title;
        $description = $this->faker->sentence;

        $status = Status::factory()->create();

        Livewire::test(PostUpdate::class, [
            'post' => $post,
        ])
            ->set('form.status_id', $status->id)
            ->set('form.title', $title)
            ->set('form.description', $description)
            ->call('submit')
            ->assertRedirect(Index::class)
            ->assertSessionHas('alert', [
                'type' => 'success',
                'message' => 'Post updated',
            ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'status_id' => $status->id,
            'title' => $title,
            'description' => $description,
        ]);
    }
}
