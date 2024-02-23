<?php

namespace App\Livewire\Status;

use App\Models\Post;
use App\Models\Status;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StatusUpdate extends Component
{
    public Post $post;

    public int $status_id;

    public function mount()
    {
        $this->status_id = $this->post->status_id;
    }

    public function rules()
    {
        return [
            'status_id' => [
                'required',
                'numeric',
                'exists:statuses,id',
            ],
        ];
    }

    #[Computed]
    public function statuses()
    {
        return Status::query()->get();
    }

    public function submit(): void
    {
        $this->validate();

        $this->post->update($this->only('status_id'));
    }

    public function render()
    {
        return view('livewire.status.status-update');
    }
}
