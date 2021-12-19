<x-layouts.main>

<h1>PuasPoll's Public Poll List</h1>

<a role="button" href="{{route('polls.create')}}">Create New Poll</a>

<table role="grid">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">#Participants</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->title }}</td>
        <td>{{ $item->slug }}</td>
        <td>{{ $item->num_voter }}</td>
        <td>
            <a href="{{ route('polls.show', ['slug' => $item->slug ]) }}">Fill the Poll</a>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>


</x-layouts.main>

