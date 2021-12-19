<x-layouts.main>

@if (session('status'))
    <mark>
        {{ session('status') }}
    </mark>
@endif

<h1>Result for polling "{{$poll->title}}"</h1>

<x-poll.result_chart :poll="$poll"/>

</x-layouts.main>

