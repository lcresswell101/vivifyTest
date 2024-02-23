<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\PostForm;
use App\Livewire\Index;
use App\Models\Post;
use App\Models\Status;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostUpdate extends Component
{
    public PostForm $form;

    public function mount(Post $post): void
    {
        $this->form->setPost($post);
    }

    #[Computed]
    public function statuses()
    {
        return Status::query()->get();
    }

    public function submit(): void
    {
        $this->form->update();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Post updated',
        ]);

        $this->redirect(Index::class);
    }

    public function render()
    {
        return view('livewire.posts.post-update');
    }
}
