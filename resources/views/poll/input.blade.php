<x-layouts.base>

    @if (session('status'))
        <mark>
            {{ session('status') }}
        </mark>
    @endif

    <h2>{{ $item->title }}</h2>
    <p>{{ $item->description }}</p>

    <x-poll.input_form :item="$item" form_action="{{route('polls.input', ['slug' => $item->slug])}}"/>

</x-layouts.base>

