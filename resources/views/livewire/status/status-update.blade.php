<div>
    <label
        for="status_id"
        class="font-sans text-sm font-normal text-blue-gray-700"
    >
        Status
    </label>

    <select
        wire:model="status_id"
        wire:change="submit"
        class="w-full block rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 disabled:bg-blue-gray-50"
    >
        @foreach($this->statuses as $status)]
            <option value="{{ $status->id }}">
                {{ $status->label }}
            </option>
        @endforeach
    </select>
</div>
