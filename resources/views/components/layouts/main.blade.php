<x-layouts.base>

    <!-- Header -->
    <header>
      <hgroup>
        <h1><a href="{{url('/')}}">PuasPoll</a></h1>
        <h2>The most satisfiying polling app you'll ever tried</h2>
      </hgroup>
      <nav>
        <ul>
          <li><a href="{{route('polls.index')}}">Public Polls Directory</a></li>
          <li><a href="{{route('polls.create')}}">Create new Poll</a></li>
        </ul>
      </nav>
    </header><!-- ./ Header -->

    <!-- Main -->
    <main>

        {{ $slot }}

    </main><!-- ./ Main -->

    <!-- Footer -->
    <footer>
      <small>Created by <a target="_blank" href="https://abdurrahman.adianto.id">Abdurrahman Shofy Adianto</a> • Built with <a target="_blank" href="https://laravel.com">Laravel</a> and <a target="_blank" href="https://picocss.com">PicoCSS</a>  </small>
    </footer><!-- ./ Footer -->

</x-layouts.base>
