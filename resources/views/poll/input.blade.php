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

    <article>
        <h3>Input your vote</h3>

        @if (session("submission_received_{$item->slug}"))
            <mark>You has submitted your vote for this poll</mark>
        @else
            <x-poll.input_form :item="$item" form_action="{{route('polls.input', ['slug' => $item->slug])}}"/>
        @endif
    </article>

    <article>
        <h3>Latest Result</h3>

        <x-poll.result_chart :poll="$item"/>
    </article>

</x-layouts.base>

