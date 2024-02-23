<div>
    <h1 class="mb-6">
        Create Post
    </h1>

    <form wire:submit="submit">
        <div class="grid grid-rows-4 grid-flow-col gap-4">
            <div>
                <label
                    for="form.status_id"
                    class="font-sans text-sm font-normal text-blue-gray-700"
                >
                    Status
                </label>

                <select
                    class="w-full block rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 disabled:bg-blue-gray-50"
                    wire:model="form.status_id"
                >
                    <option>
                    </option>
                    @foreach($this->statuses as $status)]
                        <option value="{{ $status->id }}">
                            {{ $status->label }}
                        </option>
                    @endforeach
                </select>

                @error('form.status_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label
                    for="form.title"
                    class="font-sans text-sm font-normal text-blue-gray-700"
                >
                    Title
                </label>

                <input
                    type="text"
                    placeholder="Title..."
                    wire:model="form.title"
                    class="w-full block rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 disabled:bg-blue-gray-50"
                >

                @error('form.title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label
                    for="form.description"
                    class="font-sans text-sm font-normal text-blue-gray-700"
                >
                    Description
                </label>

                <textarea
                    wire:model="form.description"
                    class="w-full block rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 disabled:bg-blue-gray-50"
                >
                </textarea>

                @error('form.description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button
                    type="submit"
                    class="bg-green-500 text-white px-3 py-2.5 rounded-[7px] borderborder-blue-gray-200px-3py-2.5disabled:bg-blue-gray-50">
                    Create Post
                </button>
            </div>
        </div>
    </form>
</div>
