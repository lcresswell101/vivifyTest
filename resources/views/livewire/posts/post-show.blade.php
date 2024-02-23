<div class="shadow bg-gray-200 p-3 mb-3">
    <h2 class="underline">
        <a href="{{ route('posts.update', $post->id) }}" title="Update Post" wire:navigate>
            &#35;{{ $post->id }} {{ $post->title }}
        </a>
    </h2>

    <livewire:status.status-update :$post></livewire:status.status-update>

    <p class="mb-3">
        {{ $post->description }}
    </p>

    <span class="italic">
        {{ $post->created_at }}
    </span>
</div>
