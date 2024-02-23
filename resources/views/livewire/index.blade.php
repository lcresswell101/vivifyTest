<div>
    <a href="{{ route('posts.create') }}" wire:navigate>Create Post</a>

    @foreach($this->posts as $post)
        <livewire:posts.post-show :$post :key="$post->id"></livewire:posts.post-show>
    @endforeach

    {{ $this->posts->links() }}
</div>
