<div>
    <a
        class="mb-3 bg-green-500 text-white px-3 py-2.5 rounded-[7px] borderborder-blue-gray-200px-3py-2.5disabled:bg-blue-gray-50"
        href="{{ route('posts.create') }}"
        wire:navigate
    >
        Create Post
    </a>

    <div class="grid grid-rows-4 grid-flow-col gap-4">
        @foreach($this->posts as $post)
            <livewire:posts.post-show :$post :key="$post->id" lazy></livewire:posts.post-show>
        @endforeach
    </div>

    {{ $this->posts->links() }}
</div>
