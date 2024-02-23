<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Computed]
    public function posts(): CursorPaginator
    {
        return Post::query()
            ->with('status')
            ->orderBy('created_at')
            ->cursorPaginate();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
