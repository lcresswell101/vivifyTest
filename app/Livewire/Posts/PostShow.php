<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.posts.post-show');
    }
}
