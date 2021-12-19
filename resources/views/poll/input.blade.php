<x-layouts.base>

    @if (session('status'))
        <mark>
            {{ session('status') }}
        </mark>
    @endif

    <h2>{{ $item->title }}</h2>
    <p>{{ $item->description }}</p>
    @if (!empty($item->expire_time))
        <p>
            <mark>
                Notif: this poll would be deleted at {{$item->expire_time}}
            </mark>
        </p>
    @endif

    <x-poll.input_form :item="$item" form_action="{{route('polls.input', ['slug' => $item->slug])}}"/>

</x-layouts.base>

