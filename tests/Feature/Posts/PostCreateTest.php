<?php

namespace Tests\Feature\Posts;

use App\Livewire\Index;
use App\Livewire\Posts\PostCreate;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_renders_correctly() {
        Livewire::test(PostCreate::class)
            ->assertStatus(200);
    }

    public function test_see_component() {
        $this->get(route('posts.create'))
            ->assertSeeLivewire(PostCreate::class);
    }

    public function test_creates_post() {
        $title = $this->faker->title;
        $description = $this->faker->sentence;

        $status = Status::factory()->create();

        Livewire::test(PostCreate::class)
            ->set('form.status_id', $status->id)
            ->set('form.title', $title)
            ->set('form.description', $description)
            ->call('submit')
            ->assertRedirect(Index::class)
            ->assertSessionHas('alert', [
                'type' => 'success',
                'message' => 'PostShow created',
            ]);

        $this->assertDatabaseHas('posts', [
            'status_id' => $status->id,
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function test_validates_correctly() {
        Livewire::test(PostCreate::class)
            ->set('status_id', '')
            ->set('title', '')
            ->set('description', '')
            ->call('submit')
            ->assertHasErrors([
                'form.status_id' => 'required',
                'form.title' => 'required',
                'form.description' => 'required',
            ]);
    }
}
