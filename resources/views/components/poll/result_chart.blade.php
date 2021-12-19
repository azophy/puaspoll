@props([
    'poll',
])

<ul>
    @foreach ($poll->sorted_choice as $item)
        <li>
            <strong>{{ $item['title'] }}</strong> : (<u>{{ $item['score'] }} points</u> from <u>{{ $item['num_voter'] }} voters</u>)
            <progress id="score-{{$loop->index}}" value="{{ $item['score'] }}" max="{{ $poll->num_voter * 10 }}"></progress>
        </li>
      </tr>
    @endforeach

    Total Participant: <strong>{{ $poll->num_voter }} voters</strong>
</ul>

