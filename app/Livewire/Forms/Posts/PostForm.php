<?php

namespace App\Livewire\Forms\Posts;

use App\Models\Post;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    public ?int $status_id = null;

    public string $title = '';

    public string $description = '';

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->status_id = $post->status_id;

        $this->title = $post->title;

        $this->description = $post->description;
    }

    public function rules()
    {
        return [
            'status_id' => [
                'required',
                'numeric',
                'exists:statuses,id',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'max:255',
            ]
        ];
    }

    public function create()
    {
        $this->resetValidation();

        $this->validate();

        Post::query()->create($this->all());
    }

    public function update()
    {
        $this->resetValidation();

        $this->validate();

        $this->post->update(
            $this->all()
        );
    }
}
