<x-layouts.base>

    <h2>{{ $item->title }}</h2>
    <p>{{ $item->description }}</p>

    <x-poll.input_form :item="$item" form_action="{{route('poll.input', ['slug' => $item->slug])}}"/>

</x-layouts.base>

