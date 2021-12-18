<x-layouts.base>

    <h2>{{ $item->title }}</h2>
    <p>{{ $item->description }}</p>

    <x-poll.form :item="$item"/>

</x-layouts.base>

