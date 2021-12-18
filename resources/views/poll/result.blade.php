<x-layouts.base>

@if (session('status'))
    <mark>
        {{ session('status') }}
    </mark>
@endif

<h1>Result for polling "{{$poll->title}}"</h1>

<table role="grid">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Choice</th>
        <th scope="col">Score</th>
        <th scope="col">#voter</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($poll->sorted_choice as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item['title'] }}</td>
        <td>{{ $item['score'] }}</td>
        <td>{{ $item['num_voter'] }}</td>
      </tr>
    @endforeach
    </tbody>
</table>


</x-layouts.base>

