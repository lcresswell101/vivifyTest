<div class="shadow bg-gray-200 p-3 mb-3">
    <h2 class="underline">
        <a href="{{ route('posts.update', $post->id) }}">
            {{ $post->title }}
        </a>
    </h2>

    <p class="text-red-500">
        {{ $post->status->name }}
    </p>

    <p>
        {{ $post->content }}
    </p>

    <span class="italic">
        {{ $post?->user?->name }}
    </span>
</div>
