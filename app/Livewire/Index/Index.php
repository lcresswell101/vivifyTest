<?php

namespace App\Livewire\Index;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Computed]
    public function posts(): Paginator
    {
        return Post::query()
            ->with('status')
            ->orderBy('created_at')
            ->simplePaginate();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
