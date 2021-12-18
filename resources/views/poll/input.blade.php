<x-layouts.base>

    <h2>{{ $item->title }}</h2>
    <p>{{ $item->description }}</p>

    <x-poll.input_form :item="$item"/>

</x-layouts.base>

