@php(
    $status = session('alert')
)

@if (isset($status['type']) && isset($status['message']))
    <div @class([
        'bg-green-500' => $status['type'] === 'success',
        'bg-red-500' => $status['type'] === 'error',
        'p-3'
    ])>
        {{ $status['message'] }}
    </div>
@endif
