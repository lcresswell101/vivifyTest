<?php

namespace App\Livewire\Forms\Posts;

use App\Http\Requests\PostCreateUpdateRequest;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class PostForm extends Form
{
    public ?int $status_id = null;

    public string $title = '';

    public string $description = '';

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

    /**
     * @throws ValidationException
     */
    public function create()
    {
        $this->resetValidation();

        $this->validate();

        Post::query()->create($this->all());
    }
}
