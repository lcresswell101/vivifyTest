<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\PostForm;
use App\Livewire\Index\Index;
use App\Models\Status;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostCreate extends Component
{
    public PostForm $form;

    #[Computed]
    public function statuses()
    {
        return Status::query()->get();
    }

    public function submit(): void
    {
        $this->form->create();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Post created',
        ]);

        $this->redirect(Index::class);
    }

    public function render()
    {
        return view('livewire.posts.post-create');
    }
}
