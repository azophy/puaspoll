<x-layouts.base>

<table role="grid">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->title }}</td>
        <td>{{ $item->slug }}</td>
        <td>
            <a href="{{ route('poll.input', ['slug' => $item->slug ]) }}">Fill the Poll</a>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>


</x-layouts.base>

